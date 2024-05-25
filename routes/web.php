<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\StripePaymentController;


use App\Http\Controllers\CartController;

use App\Http\Controllers\HomeController;
use App\Models\Property;
use App\Models\Picture;


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
    Route::get('/dashboard', [PropertyController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    // working redirect to property detailed view
    Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');




    // cart routes       this is my 29.04 edit

    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
    Route::get('/checkout', [StripePaymentController::class, 'handleCheckout'])->name('checkout.handle');


    //stripe routes

    Route::post('/checkout/handle', [StripePaymentController::class, 'handleCheckout'])->name('checkout.handle');
    Route::get('/payment/success', [StripePaymentController::class, 'success'])->name('success');
    Route::get('/payment/cart', [StripePaymentController::class, 'cart'])->name('cart');


    //new ones 20.05.2024
    Route::get('/success', [StripePaymentController::class, 'success'])->name('success');
    Route::get('/thankyou', function () {
        return view('thankyou');
    })->name('thankyou');
    






    

});

require __DIR__ . '/auth.php';
