<?php
use App\Http\Controllers\{ProfileController, CategoryController, CustomerController, FrontEndController, HomeController, VendorsmanagementController, VendorController, SubCategoryController, AdminmanagementController, AnnouncementController, AttributeController, BannerController,BlogController, CustomermanagementController, DashboardController, InventoryController, ProductController, ShippingController, StripeController, PackagingController, NewsletterController, PlanController, VendorPackagingController, VendorShippingController, GeneralController, PageController, PermissionController, RolemanagementController, StaffmanagementController, VendorContact};
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Vendor Dashboard Routes
|--------------------------------------------------------------------------
|
*/

// VENDOR ROUTE START

//BEFORE LOGIN TRY TO SUBCRIPTION ROUTE START
Route::get('plans', [VendorController::class, 'plan_index'])->name("plans"); //--1st Step
Route::get('become/vendor/plans/{plan}', [VendorController::class, 'vendor_index'])->name('become.vendor'); //--2nd Step
Route::post('vendor/post', [VendorController::class, 'vendor_post'])->name('vendor.post'); //--3rd Step
Route::get('plans/{plan}', [VendorController::class, 'plan_show'])->name("plans.show"); //--4th Step
// Route::post('subscription', [VendorController::class, 'subscription'])->name("subscription.create"); //--5th Step
//BEFORE LOGIN TRY TO SUBCRIPTION ROUTE END

Route::middleware(['planlinkhide'])->group(function(){
    //AFTER LOGIN TRY TO SUBCRIPTION ROUTE START
    Route::get('plans_index', [PlanController::class, 'index'])->name('plan.index');
    Route::get('plans_index/{plan}', [PlanController::class, 'show'])->name('plans.index.show');
    Route::post('subscription_done', [PlanController::class, 'subscription_done'])->name("subscription.done");
    //AFTER LOGIN TRY TO SUBCRIPTION ROUTE END
});

Route::get('vendor/login', [VendorController::class, 'vendor_login'])->name('vendor.login');
Route::post('vendor/login', [VendorController::class, 'vendor_login_post_form'])->name('vendor.login.post');

Route::middleware(['vendor'])->group(function(){
    Route::get('vendor/dashboard', [VendorController::class, 'vendor_dashboard'])->name('vendor.dashboard');

    Route::group(['middleware' => ['can:vendor-setting','can:vendor-profile']], function () {
        Route::get('vendor/setting', [VendorController::class, 'vendor_setting'])->name('vendor.setting');
        Route::post('vendor/update/info',[VendorController::class,'vendor_update_info'])->name('vendor.update.info');
        Route::post('vendor/change/password',[VendorController::class,'vendor_change_password'])->name('vendor.change.password');
    });

    Route::group(['middleware' => ['can:vendor-coupon']], function () {
        Route::get('vendor/add-coupon', [VendorController::class, 'vendor_coupon_add_index'])->name('vendor.coupon.add');
        Route::post('coupon/add', [VendorController::class, 'coupon_store'])->name('coupon.add');
        Route::get('coupon/delete/{id}', [VendorController::class, 'coupon_delete'])->name('coupon.delete');
    });

    Route::group(['middleware' => ['can:vendor-order']], function () {
        Route::get('vendor/order',[VendorController::class,'vendor_orders'])->name('vendor.orders');
        Route::get('vendor/custom-invoice',[VendorController::class,'custom_invoice'])->name('custom.invoice');
        Route::post('vendor/custom-invoice',[VendorController::class,'custom_invoice_post'])->name('custom.invoice.post');
    });

    Route::group(['middleware' => ['can:vendor-earning']], function () {
        Route::get('withdraw/vendor-earning',[VendorController::class,'vendor_earning'])->name('vendor.earning');
        Route::post('withdraw/vendor-earning/withdrawal-request',[VendorController::class,'withdrawal_request'])->name('vendor.withdrawal.request');
        Route::post('withdraw/vendor-earningvendor-earning/withdrawal',[VendorController::class,'withdrawal'])->name('vendor.withdrawal');
    });
    Route::group(['middleware' => ['can:vendor-wallet']], function () {
        Route::get('wallet/vendor-wallet',[VendorController::class,'vendor_wallet'])->name('vendor.wallet');
        Route::post('wallet/vendor-wallet-update',[VendorController::class,'vendor_wallet_update'])->name('vendor.wallet.update');
    });

    Route::group(['middleware' => ['can:vendor-product management']], function () {

        Route::get('vendor/product-upload',[VendorController::class,'vendor_product_upload'])->name('vendor.product.upload');

        //ProductController Resource
        Route::resource('product', ProductController::class);
        Route::delete('galleryImgDelete/{id}',[ProductController::class, 'galleryImgDelete'])->name('galleryImg.Delete');

        //AttributeController Resource
        Route::resource('attributes', AttributeController::class);
        Route::post('attributes-store-color', [AttributeController::class, 'store_color'])->name('store_color');
        Route::get('attributes-destroy-color/{id}', [AttributeController::class, 'destroy_color'])->name('destroy_color');
        Route::post('/getIDFromCategory',[VendorController::class,'getIDFromCategory']);
        Route::post('/getIDFromCategoryForEdit',[VendorController::class,'getIDFromCategoryEdit']);

        //InventoryController
        Route::get('inventory/{product}', [InventoryController::class, 'inventory'])->name('inventory');
        Route::post('add_inventory/{product}', [InventoryController::class, 'add_inventory'])->name('add_inventory');
        Route::get('delete_inventory/{id}', [InventoryController::class, 'delete_inventory'])->name('delete_inventory');
    });

    Route::group(['middleware' => ['can:vendor-staff management']], function () {

        //StaffmanagementController
        Route::get('vendor-add-staff', [StaffmanagementController::class, 'vendorAddStaff'])->name("vendor.add.staff");
        // Route::get('vendor-staff-permission', [StaffmanagementController::class, 'vendorStaffPermission'])->name("vendor.staff.permission");
        // Route::post('vendor-staff-permission', [StaffmanagementController::class, 'vendorStaffPermission_Post'])->name("vendor.staff.permission.post");
        // Route::delete('vendor-staff-permission-delete/{id}', [StaffmanagementController::class, 'vendorStaffPermissionDelete'])->name("vendor.staff.permission.delete");
        Route::get('vendor-staff-role', [StaffmanagementController::class, 'vendorStaffRole'])->name("vendor.staff.role");
        Route::post('vendor-staff-role', [StaffmanagementController::class, 'vendorStaffRole_Post'])->name("vendor.staff.role.post");
        Route::delete('vendor-staff-role-delete/{id}', [StaffmanagementController::class, 'vendorStaffRoleDelete'])->name("vendor.staff.role.delete");
        Route::post('vendor-addstaff', [StaffmanagementController::class, 'vendorAddStaff_post'])->name("vendor.add.staff.post");
        Route::delete('vendor-addstaff/{id}', [StaffmanagementController::class, 'vendorAddStaff_delete'])->name("vendor.add.staff.delete");
    });

    //VENDOR ACCOUNCEMENT ROUTE START
    Route::get('vendor-announcement', [AnnouncementController::class, 'vendor_announcement'])->name('vendor.announcement');
    Route::get('vendor-announcement-details/{id}', [AnnouncementController::class, 'vendor_details_announcement'])->name('vendor.details.announcement');
    //VENDOR ACCOUNCEMENT ROUTE END

    //UPGRADE SUBCRIPTION ROUTE START
    Route::get('upgrade', [PlanController::class, 'upgrade'])->name('upgrade');
    Route::get('upgrade/{plan}', [PlanController::class, 'upgrade_show'])->name("upgrade.show");
    Route::post('subscription', [PlanController::class, 'upgrade_done'])->name("upgrade.done");
    //UPGRADE SUBCRIPTION ROUTE END

    //VENDOR CHAT ROUTE START
    Route::get('chat/vendor',[VendorController::class,'chatVendor'])->name('chat.vendor');
    Route::get('feedback',[VendorController::class,'feedback'])->name('feedback');
    Route::post('feedback/post',[VendorController::class,'feedbackPost'])->name('feedback.post');
    //VENDOR CHAT ROUTE END
    Route::get('listofreturn-product',[VendorController::class,'listofreturnproduct'])->name('list.of.return.product');
    Route::get('view-return-product/{id}',[VendorController::class,'viewreturnproduct'])->name('view.return.product');
    Route::post('view-return-product/{id}',[VendorController::class,'viewreturnproductPost'])->name('view.return.product.Post');
});

// VENDOR ROUTE END
