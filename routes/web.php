<?php
use App\Http\Controllers\{ProfileController, CategoryController, CustomerController, FrontEndController, HomeController, VendorsmanagementController, VendorController, SubCategoryController, AdminmanagementController, AttributeController, CustomermanagementController, DashboardController, InventoryController, ProductController, ProductListController};
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// FrontEndController
Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/categories/{slug}', [FrontEndController::class, 'categoryProduct'])->name('category.product');
Route::get('/vendor/all/product/{id}', [FrontEndController::class, 'vendorProduct'])->name('vendor.product');
Route::get('contact-us',[FrontEndController::class,'contact_us_index'])->name('contact.us');
Route::post('contact-us-post',[FrontEndController::class,'contact_us_post'])->name('contact.us.post');
Route::get('shop',[FrontEndController::class,'shop_page'])->name('shop.page');
Route::get('cart',[FrontEndController::class,'cart'])->name('cart');
Route::get('single/product/{id}',[FrontEndController::class,'single_product'])->name('single.product');


Route::middleware(['admin', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('layouts.dashboardmaster');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::get('/product_lists', function () {
    //     return view('dashboard.product.product-lists',[
    //         'products' => Product::all()
    //     ]);
    // })->middleware(['auth', 'verified'])->name('product_lists');

    //DashboardController
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('product_lists',[DashboardController::class, 'product_lists'])->middleware(['auth', 'verified'])->name('product_lists');
    Route::get('edit_product/{id}',[DashboardController::class, 'product_edit'])->middleware(['auth', 'verified'])->name('product_edit');
    Route::post('status_product/{id}',[DashboardController::class, 'product_status'])->middleware(['auth', 'verified'])->name('product_status');
    Route::get('delete_product/{id}',[DashboardController::class, 'product_delete'])->middleware(['auth', 'verified'])->name('product_delete');

    //CategoryController Resource
    Route::resource('category', CategoryController::class);

    //SubCategoryController Resource
    Route::resource('subcategory', SubCategoryController::class);

    //VendormanagementController Resource
    Route::resource('vendormanagement', VendorsmanagementController::class);
    //AdminmanagementController Resource
    Route::resource('adminmanagement', AdminmanagementController::class);
    //CustomermanagementController Resource
    Route::resource('customermanagement', CustomermanagementController::class);

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

Route::middleware(['vendor'])->group(function(){

    Route::get('vendor/dashboard', [VendorController::class, 'vendor_dashboard'])->name('vendor.dashboard');
    Route::get('vendor/setting', [VendorController::class, 'vendor_setting'])->name('vendor.setting');
    Route::get('vendor/coupon/add', [VendorController::class, 'vendor_coupon_add_index'])->name('vendor.coupon.add');
    Route::post('vendor/update/info',[VendorController::class,'vendor_update_info'])->name('vendor.update.info');
    Route::get('vendor/product/upload',[VendorController::class,'vendor_product_upload'])->name('vendor.product.upload');
    Route::post('vendor/change/password',[VendorController::class,'vendor_change_password'])->name('vendor.change.password');
    Route::post('coupon/add', [VendorController::class, 'coupon_store'])->name('coupon.add');
    Route::get('coupon/delete/{id}', [VendorController::class, 'coupon_delete'])->name('coupon.delete');
    //ProductController Resource
    Route::resource('product', ProductController::class);
    Route::resource('attributes', AttributeController::class);
    Route::post('attributes-store-color', [AttributeController::class, 'store_color'])->name('store_color');
    Route::get('attributes-destroy-color/{id}', [AttributeController::class, 'destroy_color'])->name('destroy_color');
    Route::post('/getIDFromCategory',[VendorController::class,'getIDFromCategory']);
    Route::resource('product-list',ProductListController::class);

    //InventoryController
    Route::get('inventory/{product}', [InventoryController::class, 'inventory'])->name('inventory');
    Route::post('add_inventory/{product}', [InventoryController::class, 'add_inventory'])->name('add_inventory');
    Route::get('delete_inventory/{id}', [InventoryController::class, 'delete_inventory'])->name('delete_inventory');
});



// =========================== ALL COMMON ROUTES START HERE =================



Route::middleware(['customer'])->group(function(){
    Route::get('edit/profile', [CustomerController::class, 'edit_profile'])->name('edit.profile');
    Route::post('password/update', [CustomerController::class, 'password_update'])->name('password.update');
    Route::post('change/profile/post', [CustomerController::class, 'change_profile_post'])->name('change.profile.post');

});

Route::get('customerhome', [HomeController::class, 'customerhome'])->name('customerhome')->middleware(['auth', 'verified']);
// HOME CONTROLLER START

// HOME CONTROLLER END

// // CUSTOMER CONTROLLER START

// Route::post('customer/register', [CustomerController::class, 'customer_register'])->name('customer.register');
Route::get('customer/register', [CustomerController::class, 'customer_register'])->name('customer.register');
Route::post('customer/register/post', [CustomerController::class, 'customer_register_post'])->name('customer.register.post');
Route::get('customer/login', [CustomerController::class, 'customer_login'])->name('customer.login');
Route::post('customer/login/post', [CustomerController::class, 'customer_login_post'])->name('customer.login.post');

// CUSTOMER CONTROLLER END

// EMAIL VERIFY ROUTE START
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/customerhome');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// EMAIL VERIFY ROUTE END




