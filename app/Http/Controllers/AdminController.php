<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Models\Visit;
use App\Models\Contact;
use App\Models\Categorie;
use App\Models\Newsletter;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
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

         // Get the user creation data for the last week
        $userCreationTrendData = DB::table('users')
        ->select(DB::raw('COUNT(*) as total_users'), 'created_at')
        ->where('created_at', '>=', now()->subWeek())
        ->groupBy('created_at')
        ->orderBy('created_at')
        ->get();

         // Pluck the total users from the result
         $userCreationTrendData = $userCreationTrendData->pluck('total_users');

        

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

        $totalUsers = DB::table('users')->count();

        // Get yesterday's date
        $yesterday = Carbon::yesterday()->toDateString();

        // Get the number of users from yesterday
        $usersYesterday = DB::table('users')
            ->whereDate('created_at', $yesterday)
            ->count();

        // Calculate the percentage increase
        $percentageIncrease = ($usersYesterday > 0) ? (($totalUsers - $usersYesterday) / $usersYesterday) * 100 : 0;

       
    
        return view("Admin.index", [
            'numberOfVisitors' =>$numberOfVisitors,
            'percentageChange'=>$percentageChange,
            'blogs' =>$blogs,
            'mostviewdblogs'=>$mostviewdblogs,
            'topLocationsWithPercentage' => $topLocationsWithPercentage,
            'totalViewsLastSixMonths' => $totalViewsLastSixMonths,
            'viewsTrendData' => $viewsTrendData,
            'visitsTrendData'=>$visitsTrendData,
            'BlogpercentageChange'=>$BlogpercentageChange,
            'totalUsers' => $totalUsers,
            'percentageIncrease' => $percentageIncrease,
            'userCreationTrendData'=>$userCreationTrendData,
        ]);

        
    }

    public function showUsers(){
    // Fetch users with the role "farmer"
    $allusers=User::all();

    // Calculate age from date of birth
    foreach ($allusers as $alluser) {
        $alluser->age = Carbon::parse($alluser->dob)->age;
    }

    // Pass data to the view
    return view('Admin.pages.view-users',['allusers' => $allusers]);
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
    public function delete_user(User $user){
        $user->delete();
        return redirect('/pemu-admin')->with('message', 'User deleted successfully');

    }


    public function view_newsletters(){

        $newsletters=Newsletter::all();

        return view('Admin.pages.view-newsletters', compact('newsletters'));
    }

    public function view_user($id){
        // Find the user
        $user = User::find($id);

        $user_id=$user->id;
        // Retrieve the survey responses of the user
        $surveyResponse = Survey::where('user_id', $user_id)->with('user')->first();
    
        return view('Admin.pages.single-user', ['user' => $user, 'surveyResponse' => $surveyResponse]);
    }
    


}
