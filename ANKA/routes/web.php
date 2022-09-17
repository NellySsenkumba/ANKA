<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/Customer/products');
});

Route::get('/Customer/products',  [CustomerController::class, 'index']);
Route::get('/Customer/participants',  [CustomerController::class, 'participants']);
Route::get('/Admin/reports',  [AdminController::class, 'index']);
Route::get('/Admin/participants',  [AdminController::class, 'participant']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
