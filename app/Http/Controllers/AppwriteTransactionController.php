<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Appwrite\Query;
use Illuminate\Http\Request;
use Appwrite\Services\Databases;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Pagination\LengthAwarePaginator;

class AppwriteTransactionController extends Controller
{
    //
    protected $database;

    public function __construct(Databases $database)
    {
        $this->database = $database;
    }

    public function createFarmerTransactions(Request $request) 
    {
        // Validate the request input
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric',
            'CropID' => 'required',
            'units' => 'required',
            'payment_method' => 'required',
            'farmerID' => 'required',
        ]);
    
        try {
            // Fetch product details by product_id
            $product = $this->database->getDocument(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_PRODUCTS_COLLECTION_ID'),
                $request->input('product_id')
            );
    
            // Ensure product exists
            if (!$product || !isset($product['sales_price'])) {
                throw new \Exception('Product not found or sales price is missing.');
            }
    
            // Get sales price and quantity, and convert them to numbers
            $salesPrice = floatval($product['sales_price']);
            $quantity = floatval($request->input('quantity'));
    
            // Calculate amount (sales price * quantity)
            $amount = $salesPrice * $quantity;
    
            // Convert amount to a string
            $amountStr = strval($amount);
    
            // Create the farmer transaction
            $response = $this->database->createDocument(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_FARMERTRANSACTION_COLLECTION_ID'),
                uniqid(),
                [
                    'product_name' => $product['product_name'], // assuming the product has a 'product_name'
                    'quantity' => $request->input('quantity'),
                    'CropID' => $request->input('CropID'),
                    'units' => $request->input('units'),
                    'payment_method' => $request->input('payment_method'),
                    'amount' => $amountStr, // Store the calculated amount as a string
                    'farmerID' => $request->input('farmerID'),
                ],
                []
            );
    
            // Fetch crop details by CropID
            $crop = $this->database->getDocument(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_CROPS_COLLECTION_ID'),
                $request->input('CropID')
            );
    
            // Ensure crop exists and fetch existing crop debt
            if (!$crop || !isset($crop['debt'])) {
                throw new \Exception('Crop not found or crop debt is missing.');
            }
    
            // Convert crop_debt to float
            $existingDebt = floatval($crop['debt']);
    
            // Add the amount to the existing crop debt
            $newDebt = $existingDebt + $amount;
    
            // Update the crop debt in the crops table
            $updateResponse = $this->database->updateDocument(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_CROPS_COLLECTION_ID'),
                $request->input('CropID'),
                [
                    'debt' => strval($newDebt) // Update the crop debt as a string
                ]
            );
    
            // Redirect back to farmer details page
            return redirect()->route('farmer.details', ['id' => $request->input('farmerID')])
                             ->with('success', 'Transaction created and crop debt updated successfully!');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    


}