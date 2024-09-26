<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Appwrite\Query;
use Illuminate\Http\Request;
use Appwrite\Services\Databases;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $limit = 10; // Set a limit per page
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


////////////////////////////////////////////////////////////////////////////////////////////Framer Details//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function getFarmerDetails($id)
{
    try {
        // Fetch main farmer details
        $farmer = $this->fetchFarmerDetails($id);

        // Fetch farmer transactions
        [
            'allFarmerTransactions' => $allFarmerTransactions,
            'totalAmountTransacted' => $totalAmountTransacted,
            'totalCropsGrown' => $totalCropsGrown,
            'totalTransactionsCount' => $totalTransactionsCount,
            'totalUnits' => $totalUnits,
            'cropDetails' => $cropDetails
        ] = $this->fetchFarmerTransactions($id);

        // Fetch farmer payments
        [
            'allFarmerPayments' => $allFarmerPayments,
            'totalPaymentsAmount' => $totalPaymentsAmount,
            'totalpaymentsCount' => $totalpaymentsCount,
            'totalKgsAmount' => $totalKgsAmount,
            'totalAmount_deducted' => $totalAmount_deducted,
            'cropDetailsPayments' => $cropDetailsPayments
        ] = $this->fetchFarmerPayments($id);
        $farmerCrops = $this->fetchFarmerCrops($id);

          // Fetch all products
          $allProducts = $this->fetchAllProducts();

        // Return the view with all the necessary data
        return view('Admin.pages.view-single-farmer-mobile', compact(
            'farmer',
            'allFarmerTransactions',
            'cropDetails',
            'cropDetailsPayments',
            'totalCropsGrown',
            'totalTransactionsCount',
            'totalAmountTransacted',
            'totalUnits',
            'allFarmerPayments',
            'totalPaymentsAmount',
            'totalpaymentsCount',
            'totalKgsAmount',
            'totalAmount_deducted',
             'farmerCrops',
             'allProducts',
        ));
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

// Function to fetch farmer details
private function fetchFarmerDetails($id)
{
    return $this->database->getDocument(
        env('APPWRITE_DATABASE_ID'),
        env('APPWRITE_FARMERS_COLLECTION_ID'),
        $id
    );
}

// Function to fetch farmer transactions
private function fetchFarmerTransactions($id)
{
    $limit = 25;
    $offset = 0;
    $allFarmerTransactions = [];
    $totalAmountTransacted = 0;

    $filters = [
        Query::equal('farmerID', [$id]),
        Query::orderAsc('$createdAt')
    ];

    if ($crop = request('transactionCrop')) {
        $filters[] = Query::equal('CropID', [$crop]);
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

        foreach ($farmerTransactions as $transaction) {
            $totalAmountTransacted += $transaction['amount'];
        }
    } while (count($farmerTransactions) === $limit);

    $cropIDs = array_column($allFarmerTransactions, 'CropID');
    $uniqueCropIDs = array_unique($cropIDs);
    $totalCropsGrown = count($uniqueCropIDs);
    $totalTransactionsCount = count($allFarmerTransactions);

    $cropDetailsResponse = $this->database->listDocuments(
        env('APPWRITE_DATABASE_ID'),
        env('APPWRITE_CROPS_COLLECTION_ID'),
        [Query::equal('$id', $cropIDs)]
    );
    $cropDetails = isset($cropDetailsResponse['documents'])
        ? array_column($cropDetailsResponse['documents'], null, '$id')
        : [];

    foreach ($allFarmerTransactions as &$transaction) {
        $cropID = $transaction['CropID'];
        if (isset($cropDetails[$cropID])) {
            $cropName = $cropDetails[$cropID]['crop_name'];
            $plantingDate = Carbon::parse($cropDetails[$cropID]['planting_date'])->format('d/m/Y');
            $transaction['CropName'] = "$cropName (Planted on: $plantingDate)";
        } else {
            $transaction['CropName'] = 'Unknown Crop';
        }
    }

    $unitIDs = array_column($allFarmerTransactions, 'CropID');
    $uniqueUnitIDs = array_unique($unitIDs);
    $totalUnits = count($uniqueUnitIDs);

    return [
        'allFarmerTransactions' => $allFarmerTransactions,
        'totalAmountTransacted' => $totalAmountTransacted,
        'totalCropsGrown' => $totalCropsGrown,
        'totalTransactionsCount' => $totalTransactionsCount,
        'totalUnits' => $totalUnits,
        'cropDetails' => $cropDetails
    ];
}

// Function to fetch farmer payments
private function fetchFarmerPayments($id)
{
    $limit = 25;
    $offset = 0;
    $allFarmerPayments = [];
    $totalPaymentsAmount = 0;
    $totalKgsAmount = 0;
    $totalAmount_deducted = 0;
    $cropDetailsPayments=[];

    $paymentFilters = [
        Query::equal('farmerID', [$id]),
        Query::orderAsc('$createdAt')
    ];

    if ($cropPayment = request('paymentCrop')) {
        $paymentFilters[] = Query::equal('CropID', [$cropPayment]);
    }

    do {
        $farmerPaymentsResponse = $this->database->listDocuments(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_PEMU_PAYMENTS_COLLECTION_ID'),
            array_merge($paymentFilters, [Query::limit($limit), Query::offset($offset)])
        );

        $farmerPayments = isset($farmerPaymentsResponse['documents'])
            ? $farmerPaymentsResponse['documents']
            : [];

        $allFarmerPayments = array_merge($allFarmerPayments, $farmerPayments);
        $offset += $limit;

        foreach ($allFarmerPayments as &$payment) {
            $totalPaymentsAmount += $payment['amount_payed'];
            $totalAmount_deducted += $payment['amount_deducted'];

            $harvestIDs = explode(',', $payment['HarvestIDs']);
            $harvestIDs = array_map('trim', $harvestIDs);

            $harvestDetails = [];
            $deliveryDates = [];
            $unitprices = [];
         
            foreach ($harvestIDs as $harvestID) {
                $harvestResponse = $this->database->getDocument(
                    env('APPWRITE_DATABASE_ID'),
                    env('APPWRITE_HARVESTS_COLLECTION_ID'),
                    $harvestID
                );
                if ($harvestResponse) {
                    $harvestDetails[] = $harvestResponse;
                    $deliveryDates[] = isset($harvestResponse['$createdAt']) 
                        ? Carbon::parse($harvestResponse['$createdAt'])->format('d/m/Y') 
                        : 'Unknown Date';
                    $unitprices[] = $harvestResponse['value_per_kg'];
                }
            }

            $acceptedKgs = array_column($harvestDetails, 'accepted_kgs');
            $payment['acceptedKgs'] = implode(', ', $acceptedKgs);
            $payment['totalAcceptedKilos'] = array_sum($acceptedKgs);
            $totalKgsAmount += $payment['totalAcceptedKilos'];

            $cropDetailsPayments = array_map(fn($harvestDetail) => $harvestDetail['CropID'] ?? 'Unknown Crop', $harvestDetails);
            $cropDetailsString = implode(', ', array_map(fn($crop) => is_array($crop) && isset($crop['planting_date']) && isset($crop['crop_name'])
                ? "{$crop['crop_name']} (Planted on: " . Carbon::parse($crop['planting_date'])->format('d/m/Y') . ")" 
                : 'Unknown Crop', $cropDetailsPayments));

            $payment['PaymentcropDetails'] = $cropDetailsString;
            $payment['unitPrice'] = implode(', ', $unitprices);
            $payment['deliveryDates'] = implode(', ', $deliveryDates);
        }
    } while (count($farmerPayments) === $limit);

    return [
        'allFarmerPayments' => $allFarmerPayments,
        'totalPaymentsAmount' => $totalPaymentsAmount,
        'totalpaymentsCount' => count($allFarmerPayments),
        'totalKgsAmount' => $totalKgsAmount,
        'totalAmount_deducted' => $totalAmount_deducted,
        'cropDetailsPayments' => $cropDetailsPayments,
    ];
}


private function fetchFarmerCrops($farmerId)
{
    try {
        // Fetch crops linked to the farmer
        $filters = [
            Query::equal('farmerID', [$farmerId])
        ];

        $cropsResponse = $this->database->listDocuments(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_CROPS_COLLECTION_ID'),
            $filters
        );

        $crops = isset($cropsResponse['documents']) ? $cropsResponse['documents'] : [];

        // Format crops as "Crop Name (Planted on: Date)"
        $formattedCrops = array_map(function ($crop) {
            $cropName = $crop['crop_name'] ?? 'Unknown Crop';
            $plantingDate = isset($crop['planting_date'])
                ? Carbon::parse($crop['planting_date'])->format('d/m/Y')
                : 'Unknown Date';
            return [
                'id' => $crop['$id'],
                'label' => "$cropName (Planted on: $plantingDate)"
            ];
        }, $crops);

        return $formattedCrops;
    } catch (\Exception $e) {
        // Handle exception if needed
        return [];
    }
}



private function fetchAllProducts() {
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

        return $allProducts;
    } catch (\Exception $e) {
        throw new \Exception('Error fetching products: ' . $e->getMessage());
    }
}






///////////////////////////////////////////////////////////////////////////////////Reports and statements///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  // Fetch farmer details
  private function fetchFarmerReportDetails($farmerId)
  {
      try {
          $farmerResponse = $this->database->getDocument(
              env('APPWRITE_DATABASE_ID'),
              env('APPWRITE_FARMERS_COLLECTION_ID'),
              $farmerId
          );
          return $farmerResponse;
      } catch (\Exception $e) {
          Log::error("Error fetching farmer details: " . $e->getMessage());
          throw new \Exception("Unable to retrieve farmer details.");
      }
  }

  // Build query filters
  private function buildQueryFilters($farmerId, $cropID = null)
  {
      $filters = [Query::equal('farmerID', [$farmerId]), Query::orderAsc('$createdAt')];
      if ($cropID) {
          $filters[] = Query::equal('CropID', [$cropID]);
      }
      return $filters;
  }

  // Fetch all documents with pagination logic
  private function fetchAllDocuments($collectionId, $filters, $limit = 25)
  {
      $offset = 0;
      $allDocuments = [];

      do {
          $response = $this->database->listDocuments(
              env('APPWRITE_DATABASE_ID'),
              $collectionId,
              array_merge($filters, [Query::limit($limit), Query::offset($offset)])
          );
          $documents = $response['documents'] ?? [];
          $allDocuments = array_merge($allDocuments, $documents);
          $offset += $limit;
      } while (count($documents) === $limit);

      return $allDocuments;
  }

  // Process payments for better modularity
  private function processPayments(&$payment, $harvestDetails)
  {
      $totalPaymentsAmount = 0;
      $totalAmount_deducted = 0;
      $totalKgsAmount = 0;

      $totalPaymentsAmount += $payment['amount_payed'];
      $totalAmount_deducted += $payment['amount_deducted'];

      $acceptedKgs = array_column($harvestDetails, 'accepted_kgs');
      $payment['acceptedKgs'] = implode(', ', $acceptedKgs);
      $payment['totalAcceptedKilos'] = array_sum($acceptedKgs);

      $totalKgsAmount += $payment['totalAcceptedKilos'];

      $cropDetailsString = array_map(function ($harvest) {
          $plantingDate = isset($harvest['planting_date']) ? \Carbon\Carbon::parse($harvest['planting_date'])->format('m/Y') : 'Unknown';
          return isset($harvest['crop_name']) ? "{$harvest['crop_name']} ({$plantingDate})" : 'Unknown Crop';
      }, $harvestDetails);

      $payment['PaymentcropDetails'] = implode(', ', $cropDetailsString);
      $payment['deliveryDates'] = implode(', ', array_column($harvestDetails, '$createdAt'));
      $payment['unitPrice'] = implode(', ', array_column($harvestDetails, 'value_per_kg'));
  }

  // Download PDF for transactions
  public function downloadPDF(Request $request, $farmerId)
  {
      try {
          // Fetch main farmer details
          $farmerResponse = $this->database->getDocument(
              env('APPWRITE_DATABASE_ID'),
              env('APPWRITE_FARMERS_COLLECTION_ID'),
              $farmerId
          );
          $farmer = $farmerResponse;
          $farmerName = $farmer['name'];
  
          // Fetch transactions based on selected crop or all crops
          $cropID = $request->input('CropID'); // Fetch CropID from request
  
          $limit = 25;
          $offset = 0;
          $allFarmerTransactions = [];
          $totalAmount = 0;
  
          $filters = [
              Query::equal('farmerID', [$farmerId]),
              Query::orderAsc('$createdAt')
          ];
  
          if ($cropID) {
              $filters[] = Query::equal('CropID', [$cropID]); // Filter by specific CropID
          }
  
          // Pagination to fetch all transactions
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
  
              foreach ($farmerTransactions as $transaction) {
                  $totalAmount += $transaction['amount'];
              }
          } while (count($farmerTransactions) === $limit);
  
          // Load the view for the PDF
          $pdf = PDF::loadView('Admin.templates.transactions', [
              'farmerTransactions' => $allFarmerTransactions,
              'totalAmount' => $totalAmount,
              'farmer' => $farmer
          ]);
  
          // Create the filename
          $date = Carbon::now()->format('d-m-Y');
          $filename = $cropID ? "{$farmerName}-{$date}-transactions-{$cropID}.pdf" : "{$farmerName}-{$date}-transactions.pdf";
  
          // Download the PDF with the customized filename
          return $pdf->download($filename);
      } catch (\Exception $e) {
          return response()->json(['error' => $e->getMessage()], 500);
      }
  }

///Download Payments PDF
  public function downloadFarmerPayments ($farmerId){
    try {
            // Fetch main farmer details
            $farmerResponse = $this->database->getDocument(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_FARMERS_COLLECTION_ID'),
                $farmerId
            );
            $farmer = $farmerResponse;
            $farmerName = $farmer['name']; // Assuming the farmer's name is in the 'name' field

            // Fetch farmer transactions with pagination and filters
        $limit = 25;
        $offset = 0;
        $allFarmerTransactions = [];
        $totalAmountTransacted = 0;

        $filters = [
            Query::equal('farmerID', [$farmerId]),
            Query::orderDesc('$createdAt')
        ];

        if ($crop = request('transactionCrop')) {
            $filters[] = Query::equal('CropID', [$crop]);
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
        // Fetch payments with pagination and filters
        $limit = 25;
        $offset = 0;
        $allFarmerPayments = [];
        $totalPaymentsAmount = 0;
        $totalKgsAmount = 0;
        $totalAmount_deducted = 0;

        $paymentFilters = [
            Query::equal('farmerID', [$farmerId]),
            Query::orderAsc('$createdAt')
        ];

        if ($cropPayment = request('paymentCrop')) {
            $paymentFilters[] = Query::equal('CropID', [$cropPayment]);
        }


        do {
            $farmerPaymentsResponse = $this->database->listDocuments(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_PEMU_PAYMENTS_COLLECTION_ID'),
                array_merge($paymentFilters, [Query::limit($limit), Query::offset($offset)])
            );

            $farmerPayments = isset($farmerPaymentsResponse['documents'])
                ? $farmerPaymentsResponse['documents']
                : [];

            $allFarmerPayments = array_merge($allFarmerPayments, $farmerPayments);
            $offset += $limit;



    // Calculate total payments amount
    
    foreach ($allFarmerPayments as &$payment) {
        $totalPaymentsAmount += $payment['amount_payed'];
        $totalAmount_deducted += $payment['amount_deducted'];
    
        // Extract harvest IDs from the payment
        $harvestIDs = explode(',', $payment['HarvestIDs']);
        $harvestIDs = array_map('trim', $harvestIDs);
    
        // Fetch harvest details using the harvest IDs
        $harvestDetails = [];
        $deliveryDates = [];
        $unitprices = [];
        foreach ($harvestIDs as $harvestID) {
            $harvestResponse = $this->database->getDocument(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_HARVESTS_COLLECTION_ID'),
                $harvestID
            );
            if ($harvestResponse) {
                $harvestDetails[] = $harvestResponse;
                if (isset($harvestResponse['$createdAt'])) {
                    $deliveryDates[] = \Carbon\Carbon::parse($harvestResponse['$createdAt'])->format('d/m/Y');
                    $unitprices[] = $harvestResponse['value_per_kg'];
                } else {
                    $deliveryDates[] = 'Unknown Date'; // Default case if delivery_date is missing
                }
            }
        }
    
        $acceptedKgs = array_column($harvestDetails, 'accepted_kgs');
    
        // Convert the array to a comma-separated string
        $acceptedKgsString = implode(', ', $acceptedKgs);
    
        // Assign the string to the payment array
        $payment['acceptedKgs'] = $acceptedKgsString;
        $totalAcceptedKgs = array_sum($acceptedKgs);
        $payment['totalAcceptedKilos'] = $totalAcceptedKgs;
    
        $totalKgsAmount += $payment['totalAcceptedKilos'];
    
        // Crop Details for payments
        $cropDetailsPayments = [];
        foreach ($harvestDetails as $harvestDetail) {
            if (isset($harvestDetail['CropID'])) {
                $cropDetailsPayments[] = $harvestDetail['CropID'];
            }
        }
    
        $cropDetailsString = array_map(function($crop) {
            // Ensure $crop is an array and has the expected keys
            if (is_array($crop) && isset($crop['planting_date']) && isset($crop['crop_name'])) {
                $plantingDate = \Carbon\Carbon::parse($crop['planting_date'])->format('m/Y'); // e.g., 09/2024
                return "{$crop['crop_name']} ({$plantingDate})";
            }
            return 'Unknown Crop'; // Default case if data is not as expected
        }, $cropDetailsPayments);
    
        $cropDetailsString = implode(', ', $cropDetailsString);
        $payment['PaymentcropDetails'] = $cropDetailsString;
    
        // Add delivery dates to the payment array
        $deliveryDatesString = implode(', ', $deliveryDates);
        $unitpricesString = implode(', ', $unitprices);
        $payment['unitPrice'] = $unitpricesString;
        $payment['deliveryDates'] = $deliveryDatesString;
    }
    



    $totalpaymentsCount= count($allFarmerPayments);


} while (count($farmerPayments) === $limit);

        //$totalAmount = array_sum(array_column($farmerTransactions, 'amount'));

        // Load the view for the PDF
        $pdf = PDF::loadView('Admin.templates.payments', compact('allFarmerPayments','totalAmount_deducted','totalAmountTransacted', 'totalPaymentsAmount', 'farmer'))->setPaper('a4', 'landscape');

        // Create the filename
        $date = Carbon::now()->format('d-m-Y');
        $filename = "{$farmerName}-{$date}-payments.pdf";

        // Download the PDF with the customized filename
        return $pdf->download($filename);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    

}


  public function downloadFarmerStatement($farmerId)
  {
      try {
          // Fetch farmer details
          $farmer = $this->fetchFarmerReportDetails($farmerId);
          $farmerName = $farmer['name'];
  
          // Fetch all crops associated with the farmer
          $farmerCrops = $this->fetchFarmerCrops($farmerId);
  
          // Create a map of crop IDs to crop names and planting dates
          $cropMap = [];
          foreach ($farmerCrops as $crop) {
              $cropMap[$crop['id']] = $crop['label']; // "Crop Name (Planted on: Date)"
          }
  
          // Fetch all transactions (all crops)
          $transactionFilters = $this->buildQueryFilters($farmerId);
          $allFarmerTransactions = $this->fetchAllDocuments(
              env('APPWRITE_FARMERTRANSACTION_COLLECTION_ID'),
              $transactionFilters
          );
  
          // Fetch all payments
          $paymentFilters = $this->buildQueryFilters($farmerId);
          $allFarmerPayments = $this->fetchAllDocuments(
              env('APPWRITE_PEMU_PAYMENTS_COLLECTION_ID'),
              $paymentFilters
          );
  
          // Fetch all harvest details (to calculate value from produce sold)
          $allHarvestIDs = array_merge(...array_map(function ($payment) {
              return array_map('trim', explode(',', $payment['HarvestIDs']));
          }, $allFarmerPayments));
          $harvestDetails = $this->fetchAllDocuments(
              env('APPWRITE_HARVESTS_COLLECTION_ID'),
              [Query::equal('$id', $allHarvestIDs)]
          );
  
          // Create a map of harvest IDs to crops (via the CropID relationship in the harvest)
          $harvestCropMap = [];
          foreach ($harvestDetails as $harvest) {
              // Extract CropID and planting date from the nested structure
              $cropIDObject = $harvest['CropID'] ?? null;
              if ($cropIDObject && isset($cropIDObject['$id'])) {
                  $plantingDate = isset($cropIDObject['planting_date']) 
                      ? Carbon::parse($cropIDObject['planting_date'])->format('d/m/Y') 
                      : 'Unknown Date';
                  $cropLabel = isset($cropIDObject['crop_name']) 
                      ? "{$cropIDObject['crop_name']} (Planted on: $plantingDate)" 
                      : 'Unknown Crop';
                  $harvestCropMap[$harvest['$id']] = $cropLabel;
              } else {
                  $harvestCropMap[$harvest['$id']] = 'Unknown Crop';
              }
          }
  
          $statement = [];
          $cumulativeBalance = 0;
  
          // Combine transactions and payments into a single array
          $combinedRecords = [];
  
          // Process transactions first (purchases)
          foreach ($allFarmerTransactions as $transaction) {
              $cropID = $transaction['CropID'] ?? null;
              // Find the crop name with planting date for the transaction
              $crop = $cropID && isset($cropMap[$cropID]) ? $cropMap[$cropID] : 'Unknown Crop';
              $product = $transaction['product_name'] ?? 'Unknown Product';
              $amountSpent = $transaction['amount'];
              $transactionDate = Carbon::parse($transaction['$createdAt']); // Assuming 'created_at' holds the transaction date
  
              $combinedRecords[] = [
                  'type' => 'transaction',
                  'date' => $transactionDate,
                  'crop' => $crop,
                  'product' => $product,
                  'amount_spent' => $amountSpent,
                  'kg_sold' => null,
                  'value_sold' => null
              ];
          }
  
          // Process payments (produce sold and value earned)
          foreach ($allFarmerPayments as $payment) {
              $harvestIDs = array_map('trim', explode(',', $payment['HarvestIDs']));
              $currentHarvestDetails = array_filter($harvestDetails, function ($harvest) use ($harvestIDs) {
                  return in_array($harvest['$id'], $harvestIDs);
              });
  
              // Find the crop name with planting date for the payment via the associated harvests
              $crop = isset($harvestCropMap[$harvestIDs[0]]) ? $harvestCropMap[$harvestIDs[0]] : 'Unknown Crop';
              $acceptedKgs = array_sum(array_column($currentHarvestDetails, 'accepted_kgs'));
              $kgsvalueamount = array_sum(array_column($currentHarvestDetails, 'total_value'));
              $amountEarned = $payment['amount_payed'];
              $paymentDate = Carbon::parse($payment['$createdAt']); // Assuming 'created_at' holds the payment date
  
              $combinedRecords[] = [
                  'type' => 'payment',
                  'date' => $paymentDate,
                  'crop' => $crop,
                  'product' => null,
                  'amount_spent' => null,
                  'kg_sold' => $acceptedKgs,
                  'value_sold' => $kgsvalueamount
              ];
          }
  
          // Sort the combined records by date
          usort($combinedRecords, function ($a, $b) {
              return $a['date']->timestamp - $b['date']->timestamp;
          });
  
          // Generate the statement
          foreach ($combinedRecords as $record) {
              if ($record['type'] === 'transaction') {
                  $cumulativeBalance += $record['amount_spent']; // Increase balance by amount spent
              } elseif ($record['type'] === 'payment') {
                  $cumulativeBalance -= $record['value_sold']; // Decrease balance by amount earned
              }
  
              $statement[] = [
                  'crop' => $record['crop'],
                  'transaction' => $record['product'],
                  'amount_spent' => $record['amount_spent'],
                  'kg_sold' => $record['kg_sold'],
                  'value_sold' => $record['value_sold'],
                  'balance' => $cumulativeBalance,
              ];
          }
  
          // Load the view for the PDF
          $pdf = PDF::loadView('Admin.templates.farmer-statements', [
              'statement' => $statement,
              'farmer' => $farmer,
          ])->setPaper('a4', 'landscape');
  
          // Create the filename
          $date = Carbon::now()->format('d-m-Y');
          $filename = "{$farmerName}-{$date}-statement.pdf";
  
          // Download the PDF with the customized filename
          return $pdf->download($filename);
  
      } catch (\Exception $e) {
          Log::error("Error generating statement: " . $e->getMessage());
          return response()->json(['error' => 'There was an error generating the statement.'], 500);
      }
  }
  


  


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Admin.templates.farmer-statements




















































//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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