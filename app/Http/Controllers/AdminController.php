<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Models\Visit;
use App\Models\Contact;
use App\Models\Categorie;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
        
        //Count
        $farmersCount = User::where('role', 'farmer')->count();
        $providersCount = User::where('role', 'provider')->count();
       
        $blogs = Blog::latest('created_at')->limit(4)->get();
        $mostviewdblogs = Blog::orderByDesc('views')->limit(5)->get();

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


        //visits by country
        $totalVisits = Visit::count();

        $topLocations = Visit::select('country_name', 'country_code', 'city', DB::raw('count(*) as visits_count'))
            ->groupBy('country_name', 'city', 'country_code')
            ->orderByDesc('visits_count')
            ->limit(5)
            ->get();
        
        $topLocationsWithPercentage = $topLocations->map(function ($location) use ($totalVisits) {
            $percentage = ($location->visits_count / $totalVisits) * 100;
            $location->percentage = round($percentage, 2);
            return $location;
        });

        //Views Trends
        $totalViewsLastSixMonths = Blog::where('created_at', '>=', now()->subMonths(6))
        ->sum('views');
        $viewsTrendData = DB::table('blogs')
            ->select(DB::raw('SUM(views) as total_views'), 'created_at')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('created_at')
            ->orderBy('created_at')
            ->get();

        $viewsTrendData = $viewsTrendData->pluck('total_views');

        //Farmer Trends
                $farmersTrendData = DB::table('users')
                ->select(DB::raw('COUNT(id) as new_farmers_count'), 'created_at')
                ->where('role', 'farmer')
                ->where('created_at', '>=', now()->subDays(7))
                ->groupBy('created_at')
                ->orderBy('created_at')
                ->get();

        $farmersTrendData = $farmersTrendData->pluck('new_farmers_count');
        //Provider Trends
        $ProvidersTrendData = DB::table('users')
        ->select(DB::raw('COUNT(id) as new_providers_count'), 'created_at')
        ->where('role', 'provider')
        ->where('created_at', '>=', now()->subDays(7))
        ->groupBy('created_at')
        ->orderBy('created_at')
        ->get();

        $ProvidersTrendData = $ProvidersTrendData->pluck('new_providers_count');

        //Visits Trends
        $visitsTrendData = DB::table('visits')
            ->select(DB::raw('COUNT(id) as total_visits'), 'visited_on')
            ->where('visited_on', '>=', now()->subDays(7))
            ->groupBy('visited_on')
            ->orderBy('visited_on')
            ->get();

        $visitsTrendData = $visitsTrendData->pluck('total_visits');


        //Blog view calaculate
        $viewsYesterday = Blog::whereDate('created_at', Carbon::yesterday())->sum('views');

        // Get blog views for today
        $viewsToday = Blog::whereDate('created_at', Carbon::today())->sum('views');
    
        // Calculate percentage change
        $BlogpercentageChange =($viewsYesterday != 0) ? (($viewsToday - $viewsYesterday) / $viewsYesterday) * 100 : ($viewsToday != 0 ? 100 : 0);
        

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
            'mostviewdblogs'=>$mostviewdblogs,
            'topLocationsWithPercentage' => $topLocationsWithPercentage,
            'totalViewsLastSixMonths' => $totalViewsLastSixMonths,
            'viewsTrendData' => $viewsTrendData,
            'farmersTrendData'=>$farmersTrendData,
            'ProvidersTrendData'=>$ProvidersTrendData,
            'visitsTrendData'=>$visitsTrendData,
            'BlogpercentageChange'=>$BlogpercentageChange,
        ]);

        
    }

    public function showFarmers(){
    // Fetch users with the role "farmer"
    $farmers = User::where('role', 'farmer')->get();

    // Calculate age from date of birth
    foreach ($farmers as $farmer) {
        $farmer->age = Carbon::parse($farmer->dob)->age;
    }

    // Pass data to the view
    return view('Admin.pages.view-farmers',['farmers' => $farmers]);
}

public function showProviders(){
    // Fetch users with the role "farmer"
    $providers = User::where('role', 'provider')->get();

    // Calculate age from date of birth
    foreach ($providers as $provider) {
        $provider->age = Carbon::parse($provider->dob)->age;
    }

    // Pass data to the view
    return view('Admin.pages.view-providers',['providers' => $providers]);
    
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




    public function category(){


        return view('Admin.pages.category-create');
    }



    public function create_category(Request $request){

        $formFields = $request->validate([
            'name' => ['required' ],
        ]);

        Categorie::create($formFields);

        return redirect('/pemu-admin')->with('message', 'Category created successfully!');


    }


    public function view_contacts(){

        $contacts=Contact::all();

        return view('Admin.pages.view-contacts', compact('contacts'));
    }

    public function specific_contact($id){
        $contact = Contact::find($id);

        return view('Admin.pages.single-contact', compact('contact'));
    }

    public function delete_contact(Contact $contact){
        $contact->delete();
        return redirect('/pemu-admin')->with('message', 'Contact deleted successfully');

    }

    public function view_newsletters(){

        $newsletters=Newsletter::all();

        return view('Admin.pages.view-newsletters', compact('newsletters'));
    }


}
