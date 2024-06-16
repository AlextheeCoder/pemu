<?php

namespace App\Http\Controllers;

use Appwrite\Services\Databases;
use Illuminate\Http\Request;
use Appwrite\Query;
use Illuminate\Pagination\LengthAwarePaginator;

class AppwriteController extends Controller
{
    //
    protected $database;

    public function __construct(Databases $database)
    {
        $this->database = $database;
    }

   
    public function getAllFarmers(Request $request)
    {
        try {
            $response = $this->database->listDocuments(
                env('APPWRITE_DATABASE_ID'),
                env('APPWRITE_FARMERS_COLLECTION_ID'),
                [
                    Query::orderDesc('$createdAt'),
                ]
            );

            $farmers = $response['documents'];
              // Manually paginate the farmers array
              $perPage = 10;
              $page = $request->get('page', 1);
              $offset = ($page - 1) * $perPage;
  
              $farmersCollection = collect($farmers);
              $paginatedFarmers = new LengthAwarePaginator(
                  $farmersCollection->slice($offset, $perPage)->all(),
                  $farmersCollection->count(),
                  $perPage,
                  $page,
                  ['path' => $request->url(), 'query' => $request->query()]
              );
  

              return view('Admin.pages.view-mobile-farmers', ['farmers' => $paginatedFarmers]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
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

        // Fetch additional farmer details
        $farmerDetailsResponse = $this->database->listDocuments(
            env('APPWRITE_DATABASE_ID'),
            env('APPWRITE_FARMERDETAILS_COLLECTION_ID'),
            [
                Query::equal('farmerID', [$id]),
            ]
        );

        // Ensure we have documents and access the first one
        $farmerDetails = isset($farmerDetailsResponse['documents']) && count($farmerDetailsResponse['documents']) > 0
            ? $farmerDetailsResponse['documents'][0]
            : null;

        return view('Admin.pages.view-single-farmer-mobile', compact('farmer', 'farmerDetails'));
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}