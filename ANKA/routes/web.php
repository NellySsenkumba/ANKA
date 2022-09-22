<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Name;

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

Route::get('/Customer/products',  [CustomerController::class, 'index'])->name('Customer.products');
Route::post('/Customer/products',  [CustomerController::class, 'create'])->name('Customer.products');
Route::get('/Customer/participants',  [CustomerController::class, 'participants'])->name('Customer.participants');
Route::get('/Admin/reports',  [AdminController::class, 'index'])->name('Admin.reports');
Route::get('/Admin/participants',  [AdminController::class, 'participant'])->name('Admin.participants');



Auth::routes(
    // ['register'=>false]
);

