<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
        
        //Count
        $farmersCount = User::where('role', 'farmer')->count();
        $providersCount = User::where('role', 'provider')->count();
       
        $blogs = Blog::latest('created_at')->limit(4)->get();

        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
        

        $numberOfVisitors = Visit::where('visited_on', '>=', $currentMonthStart)
                                ->where('visited_on', '<=', $currentMonthEnd)
                                ->distinct('ip_address') // Replace 'user_id' with your actual column
                                ->count();
        // Last month
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        $lastMonthVisitors = Visit::where('visited_on', '>=', $lastMonthStart)
                                ->where('visited_on', '<=', $lastMonthEnd)
                                ->distinct('ip_address') 
                                ->count();

        // Difference and percentage change
        $difference = $numberOfVisitors - $lastMonthVisitors;

        if ($lastMonthVisitors == 0) {
            $percentageChange = $numberOfVisitors > 0 ? 100 : -100; // Treat as 100% increase or decrease
        } else {
            $percentageChange = ($difference / $lastMonthVisitors) * 100;
        }


        

        //Latest users
        $latestUsers = User::orderBy('created_at', 'desc')->take(8)->get();
        // Get today's date and yesterday's date
        $today = Carbon::now()->toDateString();
        $yesterday = Carbon::yesterday()->toDateString();
    

        // Get counts for today
        $userstoday = User::whereDate('created_at', $today)->count();
        $farmersCountToday = User::where('role', 'farmer')->whereDate('created_at', $today)->count();
        $providersCountToday = User::where('role', 'provider')->whereDate('created_at', $today)->count();
     
    
        // Get counts for yesterday
        $farmersCountYesterday = User::where('role', 'farmer')->whereDate('created_at', $yesterday)->count();
        $providersCountYesterday = User::where('role', 'provider')->whereDate('created_at', $yesterday)->count();
    
    
        // Calculate percentage increase
        $farmersIncrease = ($farmersCountYesterday != 0) ? (($farmersCountToday - $farmersCountYesterday) / $farmersCountYesterday) * 100 : ($farmersCountToday != 0 ? 100 : 0);
        $providersIncrease = ($providersCountYesterday != 0) ? (($providersCountToday - $providersCountYesterday) / $providersCountYesterday) * 100 : ($providersCountToday != 0 ? 100 : 0);
     
    
        return view("Admin.index", [
            'latestUsers' => $latestUsers,
            'farmersCount' => $farmersCount,
            'providersCount' => $providersCount,
            'numberOfVisitors' =>$numberOfVisitors,
            'farmersIncrease' => $farmersIncrease,
            'percentageChange'=>$percentageChange,
            'providersIncrease' => $providersIncrease,
            'blogs' =>$blogs,
            'userstoday'=>$userstoday,
        ]);

        
    }


    public function create_blog(){

        return view('Admin.pages.create-blog');

    }


    public function viewblogs (){

        $blogs = Blog::all();
        return view('Admin.pages.viewblogs', compact('blogs'));
    }


    public function login()
    {
        if(!auth()->check()) {
           
            return view('Admin.auth.login');
        }
        else {
            return redirect('/')->with('message', 'You are already logged in. Please log out first before accessing the login page.');
        }
    
      
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
    
        // Retrieve the user instance directly from the database
        $user = User::where('email', $formFields['email'])->first();
    
        // Check if the user exists and the password is correct
        if ($user && Hash::check($formFields['password'], $user->password)) {
            $user->save();
             // Log the user in
             auth()->login($user);
        
             // Clear the email from the session
             $request->session()->forget('email');
     
             return redirect('/pemu-admin')->with('message', 'You are now logged in!');

        } else {
            return redirect('/pemu/admin/login')->with('error', 'Wrong credentials!!');
        }
    }

}
