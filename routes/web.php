<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalTypologyController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function() {
        return view('home');
    })->name('home');

    // Clusters
    Route::resource('clusters', ClusterController::class);

    // Providers
    Route::resource('providers', ProviderController::class);

    // Customers
    Route::resource('customers', CustomerController::class);

    // Animals
    Route::resource('animals', AnimalController::class);

    // Breeds
    Route::resource('breeds', BreedController::class);

    // AnimalTypologies
    Route::resource('animal-typologies', AnimalTypologyController::class);
});
