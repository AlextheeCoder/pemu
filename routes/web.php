<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;

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

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/blogs', [BlogController::class, 'blogs'] )->name('blogs');

Route::get('blog/{id}', [BlogController::class, 'blogdetail'])->name('blog.detail');

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
    return redirect('/')->with('message', 'Logged Out.');; // Redirect to homepage
})->name('logout'); 

//Normal user auth
Route::post('/authenticate', [UserController::class, 'authenticate']);


//Store Comments
Route::post('/blog/{blog}/comments', [BlogController::class, 'storeComment'])->name('comments.store');









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
Route::delete('/pemu/delete/blog/{blog}', [BlogController::class, 'delete'])->name('blog.delete');


//Store Blog
Route::post('/pemu/blogs/store', [BlogController::class, 'store'])->middleware('checkRole:admin');


Route::get('/pemu/admin/view/blogs',[AdminController::class,'viewblogs'])->middleware('checkRole:admin');

//Store Categories
Route::post('/pemu/category/store', [AdminController::class, 'create_category'])->middleware('checkRole:admin');


Route::get('/pemu/category/create',[AdminController::class,'category'])->middleware('checkRole:admin');


//Show farmers
Route::get('/pemu/farmers/view',[AdminController::class,'showFarmers'])->middleware('checkRole:admin');
//Show providers
Route::get('/pemu/providers/view',[AdminController::class,'showProviders'])->middleware('checkRole:admin');