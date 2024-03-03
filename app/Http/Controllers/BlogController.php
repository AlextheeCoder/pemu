<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Visit;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;

class BlogController extends Controller
{
    //

    public function index(Request $request){

 
        $ip = $request->ip();
        if ($ip == '127.0.0.1' || $ip == '::1') {
            
            $ip = 'localhost';
        }

       
        $location=Location::get($ip);
        $city=$location->cityName;
        $country=$location->countryName;
        $countrycode=$location->countryCode;
        
        Visit::create([
            'visited_on' => Carbon::today(),
            'ip_address' => $ip,
            'country_name' => $country, 
            'city' => $city,
            'country_code' => $countrycode

        ]);
    
       
        return view('index'); 
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
