<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Index Route
Route::get('/', function () {
    return view('index');
});

//Get Create Post 
Route::get('/create-post', function () {
    return view('create-post');
});


//Show register create form
Route::get("/register", [UserController::class, "create"])->middleware("guest");

//Create new user
Route::post("/users", [UserController::class, 'store']);

//Log user out  
Route::post("/logout", [UserController::class, "logout"])->middleware("auth");

//Show Login Form
Route::get('/login', [UserController::class, "login"])->name("login")->middleware("guest");

//Login User
Route::post("/users/authenticate", [UserController::class, "authenticate"]);

//Store community data
Route::post('/communities', [CommunityController::class, "store"])->middleware("auth");

//Show Community
Route::get('/communities/{community}', [CommunityController::class, "show"])->middleware("auth");