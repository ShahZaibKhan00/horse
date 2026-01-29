<?php

use App\Http\Controllers\AllController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RealstateController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PlanController;

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

Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::get('migrate/data', function() {
    Artisan::call('migrate:fresh');
});
// Route::view('abc', 'admin.membership');
Auth::routes();

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/admin-membership', [HomeController::class, 'adminMembership'])->name('admin.membership');
Route::get('/profile', [HomeController::class, 'profile_us'])->name('profile');
Route::post('/update-profile-image', [HomeController::class, 'updateProfileImage'])->name('update.profile.image');
Route::get('/edit_profile', [HomeController::class, 'edit_profile'])->name('edit.profile');
Route::post('/update_profile_info', [HomeController::class, 'updateProfileInfo'])->name('update.profile.info');
Route::get('/general', [HomeController::class, 'general_us'])->name('general');
Route::post('/update-logo-image', [HomeController::class, 'updateLogoImage'])->name('update.logo.image');
Route::get('/edit_general', [HomeController::class, 'edit_general'])->name('edit.general');
Route::post('/update_general_info', [HomeController::class, 'updateGeneralInfo'])->name('update.general.info');
Route::get('/orders', [HomeController::class, 'orders'])->name('orders');
Route::get('/view_order/{id}', [HomeController::class, 'view_order'])->name('view_order');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::get('favorite-horses', [HomeController::class, 'horse'])->name('horse');
Route::get('favorite-realstate', [HomeController::class, 'realstate'])->name('realstate');
Route::get('subscription', [PlanController::class, 'package'])->name('package');
Route::get('subscription/download/{id}', [AllController::class, 'invoice'])->name('package.download');
Route::get('list-management', [PlanController::class, 'listing'])->name('listing');
Route::get('payment/page/{id}', [AllController::class, 'payment'])->name('payment.link');
Route::get('sucess/payment', [AllController::class, 'sucess'])->name('payment.sucess');
Route::get('cancel/payment', [AllController::class, 'cancel'])->name('payment.cancel');

// Front Controller
Route::get('/', [FrontController::class, 'index'])->name('/');
Route::get('/about_us', [FrontController::class, 'about_us'])->name('about_us');
Route::get('/products', [FrontController::class, 'products'])->name('products');
Route::get('/services', [FrontController::class, 'services'])->name('services');
Route::get('/horse_listing_filter', [FrontController::class, 'horse_listing_filter'])->name('horse_listing_filter');
// Route::get('/abc', [FrontController::class, 'abc'])->name('horse_listing_filter1');
Route::get('/service_listing_filter', [FrontController::class, 'service_listing_filter'])->name('service_listing_filter');
Route::get('/farm_directory_listing_filter', [FrontController::class, 'farm_directory_listing_filter'])->name('farm_directory_listing_filter');
Route::get('/realestate_listing_filter', [FrontController::class, 'realestate_listing_filter'])->name('realestate_listing_filter');
Route::get('/service_details/{id}', [FrontController::class, 'service_details'])->name('service_details');
Route::get('/farm_listing', [FrontController::class, 'farm_listing'])->name('farm_listing');
Route::get('/farm_detail', [FrontController::class, 'farm_detail'])->name('farm_detail');
Route::get('/membership_form', [FrontController::class, 'membership_form'])->name('membership_form');
Route::get('/membership', [FrontController::class, 'membership'])->name('membership');
Route::get('/realestate', [FrontController::class, 'realestate'])->name('realestate');
Route::get('user/dashboard', [HomeController::class, 'dashboardU'])->name('dashboardU');
// Route::get('/view_detail', [FrontController::class, 'view_detail_page'])->name('view_detail_page');
Route::get('/faqs', [FrontController::class, 'faqs'])->name('faqs');
Route::get('/product/{id}', [FrontController::class, 'cate_products'])->name('product');
Route::get('/products_detail/{id}', [FrontController::class, 'products_detail'])->name('products_detail');
Route::get('/seller_profile_one/{id}', [FrontController::class, 'seller_profile_one'])->name('seller_profile_one');
Route::get('/seller_profile_main/{id}', [FrontController::class, 'seller_profile_main'])->name('seller_profile_main');
Route::get('/cart', [FrontController::class, 'cart'])->name('cart');
Route::get('/thankyou', [FrontController::class, 'thankyou'])->name('thankyou');
Route::get('/accessories', [FrontController::class, 'accessories'])->name('accessories');
Route::get('/contact_us', [FrontController::class, 'contact_us'])->name('contact_us');
Route::post('/cart_submit', [FrontController::class, 'cart_submit'])->name('cart_submit');
Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');
Route::post('/submit_order', [FrontController::class, 'submit_order'])->name('submit_order');
Route::get('/order_complated', [FrontController::class, 'order_complated'])->name('order_complated');

Route::post('farm-favorite/{id}', [FrontController::class, 'farmFavorite'])->name('farm.favorite');
Route::post('horse-favorite/{id}', [FrontController::class, 'horseFavorite'])->name('horse.favorite');
// Front Controller

// Category routes -------
Route::get('/manage_category', [CategoryController::class, 'index'])->name('manage_category');
Route::get('/add_category', [CategoryController::class, 'create'])->name('add_category');
Route::post('/cate_store', [CategoryController::class, 'store']);
Route::get('/edit_category/{id}', [CategoryController::class, 'edit']);
Route::post('/update_cate', [CategoryController::class, 'update']);
Route::delete('/delete_cate/{id}', [CategoryController::class, 'destroy'])->name('faq.destroy');

// Products routes -------
Route::get('/products/{id}', [ProductController::class, 'index'])->name('products');
Route::get('/add_product/{name}', [ProductController::class, 'create'])->name('add_product');
Route::post('/submit_list', [ProductController::class, 'store'])->name('submit_list');
Route::get('/edit_list/{id}/{name}', [ProductController::class, 'edit'])->name('edit_list');
Route::post('/update_product', [ProductController::class, 'update'])->name('update_product');
Route::delete('/delete_product/{id}/{name}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/delete_addon/{id}/{proid}/{name}', [ProductController::class, 'destroy_addon']);
// Route::post('/delete_addon/{id}/{name}', [ProductController::class, 'destroy_addon'])->name('addon.destroy');
Route::get('horse-listing', [AllController::class, 'index'])->name('horse-listing');
Route::get('realstate-listing', [AllController::class, 'reals'])->name('realstate-listing');
Route::get('service-listing', [AllController::class, 'ser'])->name('service-listing');
// Service routes -------
Route::get('/manage_service', [ServiceController::class, 'index'])->name('manage_service');
Route::get('/add_service', [ServiceController::class, 'create'])->name('add_service');
Route::post('/service_store', [ServiceController::class, 'store']);
Route::get('/edit_service/{id}', [ServiceController::class, 'edit']);
Route::post('/update_service', [ServiceController::class, 'update']);
Route::delete('/delete_service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

// Realstate routes -------
Route::get('/manage_realstate', [RealstateController::class, 'index'])->name('manage_realstate');
Route::get('/add_realstate', [RealstateController::class, 'create'])->name('add_realstate');
Route::post('/realstate_store', [RealstateController::class, 'store']);
Route::get('/edit_realstate/{id}', [RealstateController::class, 'edit']);
Route::post('/update_property', [RealstateController::class, 'update']);

Route::delete('/delete_realstate/{id}', [RealstateController::class, 'destroy'])->name('service.destroy');

// Blogs routes -------
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/add_blog', [BlogController::class, 'create'])->name('add_blog');
Route::post('/blog_store', [BlogController::class, 'store']);
Route::get('/edit_blog/{id}', [BlogController::class, 'edit']);
Route::post('/update_blog', [BlogController::class, 'update']);
Route::get('/delete_blog/{id}', [BlogController::class, 'destroy']);

Route::get('admin/plan', [PlanController::class, 'index'])->name('admin.plan');
Route::get('admin/add-plan', [PlanController::class, 'create'])->name('admin.add-plan');
Route::post('admin/post-plan', [PlanController::class, 'store'])->name('admin.add-plan');

Route::get('/plans/create', [PlanController::class, 'create'])->name('admin.plans.create');
Route::post('/plans', [PlanController::class, 'store'])->name('admin.plans.store');

Route::get('/plans/{id}/edit', [PlanController::class, 'edit'])->name('admin.plans.edit');
Route::put('/plans/{id}', [PlanController::class, 'update'])->name('admin.plans.update');
Route::delete('/plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');


// Payments routes -------
Route::post('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/charge', [PaymentController::class, 'charge'])->name('payment.charge');
Route::get('/responce', [PaymentController::class, 'responce'])->name('payment.responce');
