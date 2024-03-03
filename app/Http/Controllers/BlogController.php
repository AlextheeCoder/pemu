<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Visit;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    //

    public function index($apiKey = null, $ip = null)
    {
        // Get API key from environment (better security)
        $apiKey = $apiKey ?? env('IP_GEOLOCATION_API_KEY');
    
        // Use the visitor's IP if not provided explicitly
        $ip = $ip ?? request()->ip();
    
        // Get Geolocation Data 
        $client = new Client();
        $response = $client->get('https://api.ipgeolocation.io/ipgeo', [
            'query' => [
                'apiKey' => $apiKey,
                'ip' => $ip,
                
            ] 
        ]);
    
        $locationData = json_decode($response->getBody(), true);
    
        // Store Visit Data (adjust fields as needed)
        Visit::create([
            'visited_on' => Carbon::today(),
            'ip_address' => $ip,
            'country_name' => $locationData['country_name'] ?? null, 
            'city' => $locationData['city'] ?? null
        ]);
    
        // Pass location data to your view (optional)
        return view('index', ['locationData' => $locationData]); 
    }
    
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('Images', 'public');
        }

        $formFields['user_id'] = auth()->id();
        info($formFields);
        Log::info('Request data:', $request->all());
        Blog::create($formFields);

        return redirect('/pemu/admin/view/blogs')->with('message', 'Blog created successfully!');
    }
}
