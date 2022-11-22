<?php
use App\Http\Controllers\{AdminmanagementController,ProfileController, CategoryController, CustomerController, FrontEndController, HomeController, VendorsmanagementController, VendorController, SubCategoryController};

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('home');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware(['admin', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboardmaster');
    })->middleware(['auth', 'verified'])->name('dashboard');

    //CategoryController Resource
    Route::resource('category', CategoryController::class);

    //VendormanagementController Resource
    Route::resource('vendormanagement', VendorsmanagementController::class);

    //AdminmanagementController Resource
    Route::resource('adminmanagement', AdminmanagementController::class);

    // ProfileController
    Route::get('admin/profile', [ProfileController::class, 'admin_profile'])->name('admin.profile');
    Route::get('admin/profile/setting', [ProfileController::class, 'admin_profile_setting'])->name('admin.profile.setting');
    Route::post('admin/profile/setting/edit', [ProfileController::class, 'admin_profile_setting_edit'])->name('admin.profile.setting.edit');
    Route::post('admin/password/change', [ProfileController::class, 'admin_password_change'])->name('admin.password.change');
});
require __DIR__.'/auth.php';


// Vendor All Routes Start
Route::get('become/vendor', [VendorController::class, 'vendor_index'])->name('become.vendor');
Route::post('vendor/post', [VendorController::class, 'vendor_post'])->name('vendor.post');
Route::get('vendor/login', [VendorController::class, 'vendor_login'])->name('vendor.login');
Route::post('vendor/login', [VendorController::class, 'vendor_login_post_form'])->name('vendor.login.post');
Route::get('vendor/dashboard', [VendorController::class, 'vendor_dashboard'])->name('vendor.dashboard');
Route::post('vendor/update/info',[VendorController::class,'vendor_update_info'])->name('vendor.update.info');
Route::post('vendor/change/password',[VendorController::class,'vendor_change_password'])->name('vendor.change.password');


// // CUSTOMER CONTROLLER START
// Route::post('customer/register', [CustomerController::class, 'customer_register'])->name('customer.register');
Route::get('customer/register', [CustomerController::class, 'customer_register'])->name('customer.register');
Route::post('customer/register/post', [CustomerController::class, 'customer_register_post'])->name('customer.register.post');
Route::get('customer/login', [CustomerController::class, 'customer_login'])->name('customer.login');
Route::post('customer/login/post', [CustomerController::class, 'customer_login_post'])->name('customer.login.post');
Route::get('edit/profile', [CustomerController::class, 'edit_profile'])->name('edit.profile');
Route::post('password/update', [CustomerController::class, 'password_update'])->name('password.update');
Route::post('change/profile/post', [CustomerController::class, 'change_profile_post'])->name('change.profile.post');
// CUSTOMER CONTROLLER END

// HOME CONTROLLER START
Route::get('customerhome', [HomeController::class, 'customerhome'])->name('customerhome');

// HOME CONTROLLER END

