<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SurveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [BlogController::class, 'index']);

//About Us
Route::get('/about-us', function () {
    return view('pages.about');
})->name('about'); 

//Blogs Page
Route::get('/blogs', [BlogController::class, 'blogs'] )->name('blogs');

//Single Blog
Route::get('/blog/post/{slug}', [BlogController::class, 'blogdetail'])->name('blog.detail');

// Contact Page
Route::get('/contact-us', function () {
    return view('pages.contact');
})->name('contact'); 

// Services Page
Route::get('/regenerative-farming-services', function () {
    return view('pages.service');
})->name('services'); 


Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/register', [UserController::class, 'register']);

//Storing users in database
Route::post('/users', [UserController::class, 'store']);

Route::get('/logout', function() {
    Auth::logout(); // Invalidate session
    return redirect('/')->with('message', 'Logged Out.');; // Redirect to homepage
})->name('logout'); 



// User Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile/view', function () {
        return view('pages.profile-view');
    })->name('profile');
});

// User Survey
Route::middleware(['auth'])->group(function () {
    Route::get('/user/survey/create', function () {
        return view('pages.survey-form.survey-create');
    })->name('survey');
});
 


//Store Survey
Route::post('/survey/store', [SurveyController::class, 'store']);


//Normal user auth
Route::post('/authenticate', [UserController::class, 'authenticate']);


//Store Comments
Route::post('/blog/{blog}/comments', [BlogController::class, 'storeComment'])->name('comments.store');

//Store Likes/dislikes
Route::post('/like-dislike', [BlogController::class, 'handleLikeDislike'])->name('like-dislike');

//Store Contacts
Route::post('/pemu/contact/store', [UserController::class, 'store_contacts']);

//Store Contacts
Route::post('/pemu/subscriber/store', [UserController::class, 'store_newsletters']);
//Add Farmers
Route::get('/add-farmer', function () {
    return view('pages.farmer-create');
})->name('add-farmer'); 


//Store Farmers
Route::post('/pemu/farmer/store', [UserController::class, 'store_farmer']);









//Admin Login
Route::get('/pemu/admin/login',[AdminController::class,'login']);

//Admin auth
Route::post('/pemu/admin/authenticate', [AdminController::class, 'authenticate']);

//Admin Panel
Route::get('/pemu-admin',[AdminController::class,'index'])->middleware('checkRole:admin');

//Create Blog Page
Route::get('/pemu/create/blog',[AdminController::class,'create_blog'])->middleware('checkRole:admin');

//See edit page
Route::get('/pemu/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit')->middleware('checkRole:admin');


///EDit Blog
Route::put('/pemu/update/{blog}', [BlogController::class, 'update'])->name('blog.update')->middleware('checkRole:admin');

// Delete Blog
Route::delete('/pemu/delete/blog/{blog}', [BlogController::class, 'delete'])->name('blog.delete')->middleware('checkRole:admin');


//Store Blog
Route::post('/pemu/blogs/store', [BlogController::class, 'store'])->middleware('checkRole:admin');


Route::get('/pemu/admin/view/blogs',[AdminController::class,'viewblogs'])->middleware('checkRole:admin');

//Store Categories
Route::post('/pemu/category/store', [AdminController::class, 'create_category'])->middleware('checkRole:admin');


Route::get('/pemu/category/create',[AdminController::class,'category'])->middleware('checkRole:admin');


//Show Users
Route::get('/pemu/users/view',[AdminController::class,'showUsers'])->middleware('checkRole:admin');
//Show providers
Route::get('/pemu/providers/view',[AdminController::class,'showProviders'])->middleware('checkRole:admin');

//View Contacts
Route::get('/pemu/contacts/view',[AdminController::class,'view_contacts'])->middleware('checkRole:admin');


// Delete Contacts
Route::delete('/pemu/delete/contact/{contact}', [AdminController::class, 'delete_contact'])->name('contact.delete')->middleware('checkRole:admin');

//View single Contact
Route::get('/pemu/view/contact/{id}', [AdminController::class, 'specific_contact'])->name('contact.detail');

//View Newsletter
Route::get('/pemu/newsletters/view',[AdminController::class,'view_newsletters'])->middleware('checkRole:admin');

//View single USer
Route::get('/pemu/view/user/{id}', [AdminController::class, 'view_user'])->name('user.detail');

// Delete User
Route::delete('/pemu/delete/user/{user}', [AdminController::class, 'delete_user'])->name('user.delete')->middleware('checkRole:admin');

Route::get('/pemu/view/surveys',[AdminController::class, 'displayAnalysis'])->middleware('checkRole:admin');

Route::get('/pemu/view/farmers', [AdminController::class, 'get_farmers'])->middleware('checkRole:admin');

Route::get('/export-csv', [AdminController::class, 'exportCSV'])->name('export-csv')->middleware('checkRole:admin');







Route::get('/sitemap.xml', function () {
    return response()->file(public_path('pemu.xml'), [
        'Content-Type' => 'text/xml'
    ]);
});

Route::get('/pemu/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'), [
        'Content-Type' => 'text/xml'
    ]);
});

Route::get('/a02b505c3b8b4cc4a7f9caf5c6d6bf07.txt', function () {
    return response()->file(public_path('a02b505c3b8b4cc4a7f9caf5c6d6bf07.txt'), [
        'Content-Type' => 'text/xml'
    ]);
});