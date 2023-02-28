<?php
use App\Http\Controllers\{ProfileController, CategoryController, CustomerController, FrontEndController, HomeController, VendorsmanagementController, VendorController, SubCategoryController, AdminmanagementController, AnnouncementController, AttributeController, BannerController,BlogController, CustomermanagementController, DashboardController, InventoryController, ProductController, ShippingController, StripeController, PackagingController, NewsletterController, PlanController, VendorPackagingController, VendorShippingController, GeneralController, PageController, PermissionController, RolemanagementController, StaffmanagementController, VendorContact};
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Customer Dashboard Routes
|--------------------------------------------------------------------------
|
*/
// HOME CONTROLLER START
Route::get('customerhome', [HomeController::class, 'customerhome'])->name('customerhome')->middleware(['auth', 'verified']);
// HOME CONTROLLER END

// CUSTOMER CONTROLLER START
Route::get('customer/register', [CustomerController::class, 'customer_register'])->name('customer.register');
Route::post('customer/register/post', [CustomerController::class, 'customer_register_post'])->name('customer.register.post');
Route::get('customer/login', [CustomerController::class, 'customer_login'])->name('customer.login');
Route::post('customer/login/post', [CustomerController::class, 'customer_login_post'])->name('customer.login.post');
Route::post('customer/profile/submit', [CustomerController::class, 'customer_profile_submit'])->name('customer.profile.submit');
// CUSTOMER CONTROLLER END

Route::middleware(['customer'])->group(function(){
    Route::get('edit/profile', [CustomerController::class, 'edit_profile'])->name('edit.profile');
    Route::post('password/update', [CustomerController::class, 'password_update'])->name('password.update');
    Route::post('change/profile/post', [CustomerController::class, 'change_profile_post'])->name('change.profile.post');
    Route::get('customer/profile/acounts/details', [CustomerController::class, 'customer_account_details'])->name('customer.account.details');
    Route::get('customer/profile/invoice', [CustomerController::class, 'customer_invoice_details'])->name('customer.invoice.details');
    Route::get('customer/profile-invoice-download/{id}', [CustomerController::class, 'invoice_download'])->name('invoice.download');
    Route::get('customer/product-review-list/', [CustomerController::class, 'product_review_list'])->name('product.review.list');
    Route::get('customer/product-review/{id}', [CustomerController::class, 'product_review'])->name('product.review');
    Route::post('customer/product-review-post/{id}', [CustomerController::class, 'product_review_post'])->name('product.review.post');
    Route::get('customer/chat-with-vendor', [CustomerController::class, 'customer_caht_with_vendor'])->name('customer.chat.vendor');
    Route::get('customer/contact-with-vendor/{id}', [VendorContact::class, 'customer_with_with_vendor'])->name('customer.contact.vendor');
    Route::get('return-product/{id}', [CustomerController::class, 'returnProduct'])->name('return.product');
    Route::get('list-ofreturn-product', [CustomerController::class, 'listReturnProduct'])->name('listreturn.product');
    Route::post('return-product-post/{id}/{invoiceID}', [CustomerController::class, 'returnProductPOST'])->name('return.product.post');
    Route::delete('return-product-delete/{id}', [CustomerController::class, 'returnProductdelete'])->name('return.product.delete');
});
