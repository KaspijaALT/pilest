<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FilterController;

use App\Http\Controllers\HomeController;
use App\Models\Property;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/filters', [FilterController::class, 'show'])->name('filter');

    Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');

    // Favorite page routes, when user likes a property, it saves the decision in database user table
    Route::get('/favorites', [PropertyController::class, 'favorites'])->name('properties.favorites')->middleware('auth');
    Route::post('/properties/{property}/like', [PropertyController::class, 'like'])->name('properties.like')->middleware('auth');


    // For the navbar issue when click on pilest logo and it outputs error.
    Route::get('/dashboard', function () {
        $properties = Property::all(); 
        return view('dashboard', ['properties' => $properties]);
    })->middleware(['auth', 'verified'])->name('dashboard');


    //Route for the property when clicked on redirect to more detailed view
    Route::get('/properties/{property_id}', [PropertyController::class, 'show'])
    ->name('properties.show')
    ->middleware('auth');
    Route::get('/properties/{property_id}', function ($property_id) {
        dd($property_id);
    });

    

});

require __DIR__ . '/auth.php';
