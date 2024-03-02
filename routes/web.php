<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/blogs', function () {
    return view('pages.blogs');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/services', function () {
    return view('pages.service');
});


Route::get('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'register']);

//Storing users in database
Route::post('/users', [UserController::class, 'store']);

Route::get('/logout', function() {
    Auth::logout(); // Invalidate session
    return redirect('/'); // Redirect to homepage
})->name('logout'); 


Route::post('/authenticate', [UserController::class, 'authenticate']);

//Admin Panel
Route::get('/pemu-admin',[AdminController::class,'index']);

//Create Blog Page
Route::get('/pemu/create/blog',[AdminController::class,'create_blog']);


Route::get('/pemu/admin/view/blogs', function () {
   return view('Admin.pages.viewblogs');
}); 