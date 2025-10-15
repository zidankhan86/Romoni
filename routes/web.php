<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;

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

//Frontend

//Pages
Route::get('/',[FrontendHomeController::class,'index'])->name('home');
Route::get('/studio',[FrontendHomeController::class,'studioIndex'])->name('studioIndex');
Route::get('/terms-condition',[FrontendHomeController::class,'termsCondition'])->name('termsCondition');
Route::get('/popular-service',[FrontendHomeController::class,'popularProduct'])->name('popularService');
Route::get('/about', [CustomPageController::class,'about'])->name('about.page');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact-store',[ContactController::class,'store'])->name('contact.store');

Route::get('/product/page',[FrontendHomeController::class,'product'])->name('product.page');
Route::get('/product/details/{slug}',[FrontendHomeController::class,'details'])->name('product.details');
Route::get('/products/cart', [ProductController::class,'cart'])->name('cart');

//Register
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/store',[AuthController::class,'store'])->name('store');
Route::get('/registration',[RegistrationController::class,'index'])->name('registration');
Route::post('/registration/store',[RegistrationController::class,'store'])->name('registration.store');
Route::get('/admin/logout',[AuthController::class,'logoutUser'])->name('user.logout');

//Frontend
Route::group(['middleware' => ['auth', 'customer']], function () {
Route::get('/checkout/process', [FrontendOrderController::class, 'processPaypalPayment'])->name('processPaypalPayment');
Route::get('/paypal/success', [FrontendOrderController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [FrontendOrderController::class, 'paypalCancel'])->name('paypal.cancel');

Route::post('/stripe-purchase', [FrontendOrderController::class, 'processStripePayment'])->name('purchase');
Route::get('/payment-success', [FrontendOrderController::class, 'StripeSuccess'])->name('stripe.success');
Route::get('/payment-cancel', [FrontendOrderController::class, 'index'])->name('stripe.cancel');

Route::post('/success', [FrontendOrderController::class, 'success'])->name('sslcommerz.success');
Route::post('/fail', [FrontendOrderController::class, 'fail'])->name('fail');
Route::post('/cancel', [FrontendOrderController::class, 'cancel'])->name('cancel');
Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::patch('/cart/update/{productId}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/remove-from-cart/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
Route::patch('/time-update/{productId}', [CartController::class, 'updateTime'])->name('cart.updateTime');
Route::get('/checkout', [FrontendOrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [FrontendOrderController::class, 'processOrder'])->name('checkout.process');

// USER PROFILE
Route::get('/user-profile', [FrontendProfileController::class, 'profile'])->name('userProfile');
Route::put('/user-profile-update/{id}', [FrontendProfileController::class, 'update'])->name('profile.update');
Route::get('/user-order', [FrontendProfileController::class, 'myOrders'])->name('user.order');
Route::middleware('auth')->post('/products/{id}/review', [FrontendHomeController::class, 'storeReview'])->name('product.review');

});

//Middleware
Route::group(['middleware' => ['auth', 'admin']], function () {
//Pages
Route::get('/admin',[HomeController::class,'index'])->name('dashboard');

Route::prefix('custom')->name('custom.')->group(function () {
Route::get('/page', [CustomPageController::class,'index'])->name('page.index');
Route::get('/edit/{id}', [CustomPageController::class,'edit'])->name('page.edit');
Route::post('/update/{id}', [CustomPageController::class,'update'])->name('page.update');
});


// CATEGORY
Route::prefix('category')->name('category.')->group(function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/destroy/{id}', [CategoryController::class, 'delete'])->name('destroy');
});

// Stuff
Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/index', [StuffController::class, 'index'])->name('index');
    Route::get('/create', [StuffController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [StuffController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [StuffController::class, 'update'])->name('update');
    Route::post('/store', [StuffController::class, 'store'])->name('store');
    Route::delete('/destroy/{id}', [StuffController::class, 'destroy'])->name('destroy');
});


//Products
Route::prefix('product')->name('product.')->group(function () {
    Route::get('/create', [ProductController::class,'create'])->name('create');
    Route::post('/store', [ProductController::class,'store'])->name('store');
    Route::get('/index', [ProductController::class,'index'])->name('index');
    Route::put('/update/{id}', [ProductController::class,'update'])->name('update');
    Route::get('/edit/{id}', [ProductController::class,'edit'])->name('edit');
    Route::delete('/delete/{id}', [ProductController::class,'delete'])->name('destroy');
});

// Testimonials
Route::prefix('testimonial')->name('testimonial.')->group(function () {
    Route::get('/create', [TestimonialController::class,'create'])->name('create');
    Route::post('/store', [TestimonialController::class,'store'])->name('store');
    Route::get('/index', [TestimonialController::class,'index'])->name('index');
    Route::put('/update/{id}', [TestimonialController::class,'update'])->name('update');
    Route::get('/edit/{id}', [TestimonialController::class,'edit'])->name('edit');
    Route::get('/delete/{id}', [TestimonialController::class,'destroy'])->name('destroy');
});

// Settings
Route::prefix('settings')->name('settings.')->group(function () {
    Route::put('/update/{id}', [SettingsController::class,'update'])->name('update');
    Route::get('/edit', [SettingsController::class,'edit'])->name('edit');
});

// Settings Profile
Route::prefix('user')->name('user.')->group(function () {
    Route::put('/update/{id}', [UserController::class,'update'])->name('update');
    Route::get('/list', [UserController::class,'index'])->name('list');
});

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/show-list', [ContactController::class,'showList'])->name('showList');
});

Route::get('admin/order/index', [OrderController::class, 'orderIndex'])->name('orderIndex');
Route::get('admin/order/invoice', [OrderController::class, 'invoice'])->name('invoice');
Route::get('/orders/{id}/assign', [OrderController::class, 'assignStaffForm'])->name('orders.assign.form');
Route::post('/orders/{id}/assign', [OrderController::class, 'assignStaff'])->name('orders.assign');

// Profile
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/setting',[SettingsController::class,'index'])->name('setting');
Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change.password');
Route::post('/update-password/{id}',[ChangePasswordController::class,'update'])->name('update.password');
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::post('/registration/update{id}',[RegistrationController::class,'update'])->name('registration.update');

});
