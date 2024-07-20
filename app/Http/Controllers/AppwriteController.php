<?php

namespace App\Http\Controllers;

use Appwrite\Services\Databases;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Appwrite\Query;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class AppwriteController extends Controller
{
    //
    protected $database;

    public function __construct(Databases $database)
    {
        $this->database = $database;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////
   
public function getAllFarmers(Request $request)
{
    try {
        // Fetch all farmers to calculate the farmer types
        $limit = 100; // Set a limit per request
        $offset = 0;
        $allFarmers = [];

        do {
            $response = $this->database->listDocuments(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_FARMERS_COLLECTION_ID'),
                [
                    Query::limit($limit),
                    Query::offset($offset),
                    Query::orderDesc('$createdAt'),
                ]
            );

            $farmers = $response['documents'];
            $allFarmers = array_merge($allFarmers, $farmers);
            $offset += $limit;

        } while (count($farmers) == $limit);

        // Group farmers by type
        $farmerTypes = [];
        foreach ($allFarmers as $farmer) {
            $type = $farmer['type']; // Assuming 'type' is the field name for farmer type
            if (!isset($farmerTypes[$type])) {
                $farmerTypes[$type] = 0;
            }
            $farmerTypes[$type]++;
        }

        // Determine the top farmer type
        arsort($farmerTypes);
        $topFarmerType = key($farmerTypes);

        // Prepare data for pie chart (farmer types)
        $pieChartData = [];
        foreach ($farmerTypes as $type => $count) {
            $pieChartData[] = ['type' => $type, 'count' => $count];
        }

        // Extract xValues and yValues for farmer type pie chart
        $xValues = [];
        $yValues = [];
        foreach ($pieChartData as $data) {
            $xValues[] = $data['type'];
            $yValues[] = $data['count'];
        }

        // Query transactions table to find the most repeated product
        $response = $this->database->listDocuments(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_FARMERTRANSACTION_COLLECTION_ID'),
            [
                Query::limit(100), // Limit to a reasonable number of documents
                Query::orderDesc('$createdAt'), // Order by createdAt descending
            ]
        );

        $transactions = $response['documents'];

        // Count occurrences of each product
        $productCounts = [];
        foreach ($transactions as $transaction) {
            $productName = $transaction['product_name']; // Assuming 'product_name' is the field name
            if (!isset($productCounts[$productName])) {
                $productCounts[$productName] = 0;
            }
            $productCounts[$productName]++;
        }

        // Determine the most repeated product
        arsort($productCounts);
        $topProduct = key($productCounts);

        // Count total transactions
        $totalTransactions = count($transactions); // Total number of transactions

        // Prepare data for pie chart (payment methods)
        $paymentMethods = [];
        foreach ($transactions as $transaction) {
            $paymentMethod = $transaction['payment_method']; // Assuming 'payment_method' is the field name
            if (!isset($paymentMethods[$paymentMethod])) {
                $paymentMethods[$paymentMethod] = 0;
            }
            $paymentMethods[$paymentMethod]++;
        }

        // Extract xValues and yValues for payment method pie chart
        $paymentMethodXValues = [];
        $paymentMethodYValues = [];
        foreach ($paymentMethods as $method => $count) {
            $paymentMethodXValues[] = $method;
            $paymentMethodYValues[] = $count;
        }

        // Paginate the farmers for the current page
        $search = $request->get('search');
        $limit = 1; // Set a limit per page
        $page = $request->get('page', 1);
        $offset = ($page - 1) * $limit;

        $queryOptions = [
            Query::limit($limit),
            Query::offset($offset),
            Query::orderDesc('$createdAt'),
        ];

        if ($search) {
            $queryOptions[] = Query::search('name', $search);
            // Add other fields to search as needed
        }

        $response = $this->database->listDocuments(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_FARMERS_COLLECTION_ID'),
            $queryOptions
        );

        $farmers = $response['documents'];
        $totalFarmers = $response['total'];

        $paginatedFarmers = new LengthAwarePaginator(
            $farmers,
            $totalFarmers,
            $limit,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('Admin.pages.view-mobile-farmers', [
            'farmers' => $paginatedFarmers,
            'totalFarmers' => $totalFarmers,
            'topFarmerType' => $topFarmerType,
            'xValues' => $xValues,
            'yValues' => $yValues,
            'topProduct' => $topProduct,
            'totalTransactions' => $totalTransactions,
            'paymentMethodXValues' => $paymentMethodXValues,
            'paymentMethodYValues' => $paymentMethodYValues,
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function getFarmerDetails($id)
{
    try {
        // Fetch main farmer details
        $farmerResponse = $this->database->getDocument(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_FARMERS_COLLECTION_ID'),
            $id
        );

        $farmer = $farmerResponse;

        // Fetch farmer transactions with pagination and filters
        $limit = 25;
        $offset = 0;
        $allFarmerTransactions = [];
        $totalAmountTransacted = 0;

        $filters = [
            Query::equal('farmerID', [$id]),
            Query::orderDesc('$createdAt')
        ];

        if ($crop = request('crop')) {
            $filters[] = Query::equal('CropID', [$crop]);
        }

        if ($account = request('account')) {
            $filters[] = Query::equal('HellaAccountID', [$account]);
        }

        do {
            $farmerTransactionsResponse = $this->database->listDocuments(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_FARMERTRANSACTION_COLLECTION_ID'),
                array_merge($filters, [Query::limit($limit), Query::offset($offset)])
            );

            $farmerTransactions = isset($farmerTransactionsResponse['documents'])
                ? $farmerTransactionsResponse['documents']
                : [];

            $allFarmerTransactions = array_merge($allFarmerTransactions, $farmerTransactions);
            $offset += $limit;

            // Calculate total amount transacted
            foreach ($farmerTransactions as $transaction) {
                $totalAmountTransacted += $transaction['amount'];
            }
        } while (count($farmerTransactions) === $limit);

        //Fetch unit details
        $unitIDs = array_column($allFarmerTransactions, 'unitID');
        $uniqueUnitIDs = array_unique($unitIDs);
        $totalUnits = count($uniqueUnitIDs);

        // Fetch crop details
        $cropIDs = array_column($allFarmerTransactions, 'CropID');
        $cropDetailsResponse = $this->database->listDocuments(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_CROPS_COLLECTION_ID'),
            [
                Query::equal('$id', $cropIDs)
            ]
        );
        $cropDetails = isset($cropDetailsResponse['documents'])
            ? array_column($cropDetailsResponse['documents'], null, '$id')
            : [];

        // Map crop names and planting dates to transactions
        foreach ($allFarmerTransactions as &$transaction) {
            $cropID = $transaction['CropID'];
            if (isset($cropDetails[$cropID])) {
                $cropName = $cropDetails[$cropID]['crop_name'];
                $plantingDate = \Carbon\Carbon::parse($cropDetails[$cropID]['planting_date'])->format('d/m/Y');
                $transaction['CropName'] = "$cropName (Planted on: $plantingDate)";
            } else {
                $transaction['CropName'] = 'Unknown Crop';
            }
        }

     

        // Calculate total crops grown
        $uniqueCropIDs = array_unique($cropIDs);
        $totalCropsGrown = count($uniqueCropIDs);

        // Calculate total transactions count
        $totalTransactionsCount = count($allFarmerTransactions);

        return view('Admin.pages.view-single-farmer-mobile', compact('farmer', 'allFarmerTransactions', 'cropDetails', 'totalCropsGrown', 'totalTransactionsCount', 'totalAmountTransacted', 'totalUnits'));
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function downloadPDF($farmerId)
{
    try {
        // Fetch main farmer details
        $farmerResponse = $this->database->getDocument(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_FARMERS_COLLECTION_ID'),
            $farmerId
        );
        $farmer = $farmerResponse;
        $farmerName = $farmer['name']; // Assuming the farmer's name is in the 'name' field

        // Fetch farmer transactions
        $farmerTransactionsResponse = $this->database->listDocuments(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_FARMERTRANSACTION_COLLECTION_ID'),
            [
                Query::equal('farmerID', [$farmerId]),
                Query::orderDesc('$createdAt')
            ]
        );
        $farmerTransactions = isset($farmerTransactionsResponse['documents'])
            ? $farmerTransactionsResponse['documents']
            : [];

        $totalAmount = array_sum(array_column($farmerTransactions, 'amount'));

        // Load the view for the PDF
        $pdf = PDF::loadView('Admin.templates.transactions', compact('farmerTransactions', 'totalAmount', 'farmer'));

        // Create the filename
        $date = Carbon::now()->format('d-m-Y');
        $filename = "{$farmerName}-{$date}-transactions.pdf";

        // Download the PDF with the customized filename
        return $pdf->download($filename);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function editFarmer(Request $request)
{
    try {
        $id = $request->input('farmerID');

        // Update farmer document in the farmers collection
        $response = $this->database->updateDocument(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_FARMERS_COLLECTION_ID'),
            $id,
            [
                'name' => $request->input('name'),
                'IDnumber' => $request->input('IDnumber'),
                'phonenumber' => $request->input('phonenumber'),
                'type' => $request->input('type'),
            ]
        );

        // Check if update was successful
        if ($response['$id'] === $id) {
            return redirect()->route('farmer.details', ['id' => $id])->with('success', 'Farmer updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update farmer.');
        }

    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}

public function viewProducts(Request $request) {
    try {
        $allProducts = [];
        $hasMore = true;
        $lastDocumentId = null;

        while ($hasMore) {
            $options = [
                Query::orderDesc('$createdAt'),
            ];

            if ($lastDocumentId) {
                $options[] = Query::cursorAfter($lastDocumentId);
            }

            $response = $this->database->listDocuments(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_PRODUCTS_COLLECTION_ID'),
                $options
            );

            if (!$response || !isset($response['documents'])) {
                throw new \Exception('Error fetching documents from the database.');
            }

            $documents = $response['documents'];
            $allProducts = array_merge($allProducts, $documents);

            if (count($documents) > 0) {
                $lastDocumentId = end($documents)['$id'];
                $hasMore = count($documents) == 25; // Assuming the limit is 25
            } else {
                $hasMore = false;
            }
        }

        // Manually paginate the products array
        $perPage = 10;
        $page = $request->get('page', 1);
        $offset = ($page - 1) * $perPage;

        $productsCollection = collect($allProducts);
        $paginatedProducts = new LengthAwarePaginator(
            $productsCollection->slice($offset, $perPage)->all(),
            $productsCollection->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('Admin.pages.view-products', ['products' => $paginatedProducts]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function createProduct(Request $request)
{
    $request->validate([
        'product_name' => 'required',
        'sales_price' => 'required',
    ]);

    try {
        $response = $this->database->createDocument(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_PRODUCTS_COLLECTION_ID'),
            uniqid(), 
            [
                'product_name' => $request->input('product_name'),
                'sales_price' => $request->input('sales_price'),
            ],[]
        );

        return redirect()->route('create-products')->with('success', 'Farmer updated successfully!');
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

// public function batchInsertProducts()
// {
//     ini_set('max_execution_time', 300);
//     $products = [
//         ['product_name' => 'Bonzin 100mls', 'sales_price' => '200.00'],
//         ['product_name' => 'Bonzin 500mls', 'sales_price' => '615.00'],
//     ];
    

//     $errors = [];
//     foreach ($products as $product) {
//         try {
//             $this->database->createDocument(
//                 env('APPWRITE_DATABASE_ID'),
//                 env('APPWRITE_PRODUCTS_COLLECTION_ID'),
//                 uniqid(),
//                 [
//                     'product_name' => $product['product_name'],
//                     'sales_price' => $product['sales_price'],
//                 ],
//                 []
//             );
//         } catch (\Exception $e) {
//             $errors[] = ['product' => $product, 'error' => $e->getMessage()];
//         }
//     }

//     if (count($errors) > 0) {
//         return response()->json(['errors' => $errors], 500);
//     }

//     return response()->json(['success' => 'All products inserted successfully!']);
// }



}