<?php
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::post('/panier/ajouter/{product}', [CartController::class, 'add'])->name('cart.add');
Route::put('/panier/maj/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/panier/supprimer/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/panier/vider', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::get('/panier', function () {
    return view('cart');
})->name('cart');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/panier/ajouter/{product}', [CartController::class, 'add'])->name('cart.add');

Route::get('/dashboard', [DashboardController::class, 'index']);
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/cards', [AdminController::class, 'cards']);  // Cette route est-elle nécessaire?
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::middleware('auth')->get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'admin')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users');
});
use App\Http\Controllers\OrderController;

Route::middleware(['auth'])->group(function () {
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
});
use App\Http\Controllers\Admin\FinanceController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('finance', [FinanceController::class, 'index'])->name('finance');
});
use App\Http\Controllers\ProductController;
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
Route::get('/admin/promotions', [AdminController::class, 'promotions'])->name('admin.promotions');
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
use App\Http\Controllers\StripeController;

Route::post('/create-checkout-session', [StripeController::class, 'create'])->name('checkout.session');
