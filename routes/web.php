<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
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

Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleSocialiteController::class, 'handleCallback']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/deleteItem/{uuid}', [AdminController::class, 'deleteClothe']);
    Route::get('/updateItem/{uuid}', [AdminController::class, 'updateItem'])->middleware(['Checkout']);
    Route::get('/addReview/{uuid}', [AdminController::class, 'addReview']);
    Route::get('/deleteReview/{uuid}', [AdminController::class, 'deleteReview']);
    Route::get('/addItems', [AdminController::class, 'addItems']);
    Route::get('/Category/{id}', [AdminController::class, 'Get_Category'])->middleware(['disable-back']);
    Route::get('/Reviews/{id}', [AdminController::class, 'Get_Reviews']);
    Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUsers']);
    Route::post('/updatedItems/{uuid}', [AdminController::class, 'updatedItems']);
    Route::post('/uploadItem', [AdminController::class, 'uploadItem']);
    Route::post('/Category', [AdminController::class, 'Category']);
    Route::get('/Orders', [AdminController::class, 'Orders']);
    Route::get('/outofstock', [AdminController::class, 'outofstock']);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/redirects', [HomeController::class, 'redirects']);
// ->middleware('auth','verified')
Route::get('/SeemoreItems/{Category}', [HomeController::class, 'SeemoreItems']);
Route::get('/BuyNow/{uuid}', [HomeController::class, 'BuyNow']);
Route::get("/showcart", [HomeController::class, 'showcart']);
Route::get("/search", [HomeController::class, 'search']);
Route::get("/SearchItems", [HomeController::class, 'SearchItems']);
Route::post("/addcart", [HomeController::class, 'addcart']);
Route::post("/reviews", [HomeController::class, 'reviews']);
Route::post("/removecart", [HomeController::class, 'removecart']);
// Route::post('/shipping', [HomeController::class, 'shipping']);
// Route::get('/shipping', [HomeController::class, 'shipping']);
// Route::post('/checkout', [HomeController::class, 'checkout']);
// Route::get('/checkout', [HomeController::class, 'checkout']);
Route::post('/notify', [HomeController::class, 'notify']);
Route::post('/addwishlist', [HomeController::class, 'addwishlist']);
Route::post('/removefromwish', [HomeController::class, 'removefromwish']);
Route::post('/searchprod', [HomeController::class, 'searchprod']);
Route::get('/OrderPlace', [HomeController::class, 'OrderPlace']);
Route::get('/myOrders', [HomeController::class, 'MyOrders']);
Route::get('/wishlist', [HomeController::class, 'wishlist']);
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

// Route::get('payment', [CheckoutController::class, 'checkout']);
Route::post('payment-done', [HomeController::class, 'afterpayment']);
// Auth::routes(['verify' => true]);
// });
Route::group(['middleware' => ['disable-back']], function () {
    Route::post('/shipping', [HomeController::class, 'shipping']);
    Route::get('/shipping', [HomeController::class, 'shipping']);
    Route::post('/checkout', [HomeController::class, 'checkout']);
    Route::get('/checkout', [HomeController::class, 'checkout']);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
