<?php
use App\Http\Controllers\{ProfileController, CategoryController, CustomerController, FrontEndController, HomeController, VendorsmanagementController, VendorController, SubCategoryController, AdminmanagementController, AttributeController, BannerController, CustomermanagementController, DashboardController, InventoryController, ProductController, ShippingController, StripeController, PackagingController, NewsletterController, PlanController, VendorPackagingController, VendorShippingController, GeneralController, PermissionController, RolemanagementController, StaffmanagementController};
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// FrontEnd ROUTE START
Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/categories/{slug}', [FrontEndController::class, 'categoryProduct'])->name('category.product');
Route::get('/vendor/all/product/{id}/{shopname}', [FrontEndController::class, 'vendorProduct'])->name('vendor.product');
Route::get('contact-us',[FrontEndController::class,'contact_us_index'])->name('contact.us');
Route::post('contact-us-post',[FrontEndController::class,'contact_us_post'])->name('contact.us.post');
Route::get('shop',[FrontEndController::class,'shop_page'])->name('shop.page');
Route::get('cart',[FrontEndController::class,'cart'])->name('cart');
Route::get('wishlist',[FrontEndController::class,'wishlist'])->name('wishlist');
Route::get('delete-wishlist/{id}',[FrontEndController::class,'wishlist_delete_row'])->name('wishlist.delete');
Route::get('checkout',[FrontEndController::class,'checkout'])->name('checkout');
Route::get('/list-of-vendors/{slug}',[FrontEndController::class,'listOfVendors'])->name('listOfVendors');
Route::get('/category-{slug}-{id}{scName}',[FrontEndController::class,'subcategoryProducts'])->name('subcategory.products');
Route::get('/offers',[FrontEndController::class,'offers'])->name('offers');


Route::post('/getStateCode',[FrontEndController::class,'stateTex']);
Route::post('checkout_post',[FrontEndController::class,'checkout_post'])->name('checkout_post');
Route::get('single/product/{id}/{title}',[FrontEndController::class,'single_product'])->name('single.product');
Route::post('report-product/{id}',[FrontEndController::class,'report_product'])->name('report.product');
Route::get('top-selection',[FrontEndController::class,'topSelection'])->name('top.selection');
Route::get('new-arrivals',[FrontEndController::class,'newArrivals'])->name('new.arrivals');
Route::get('search',[FrontEndController::class,'search'])->name('search');
// FrontEnd ROUTE END

// PAYMENTS METHOD INTEGRATION ROUTE START
//STRIPE
Route::get('stripe/checkout/post',[StripeController::class,'checkout'])->name('stripe_checkout_post');
Route::get('/success',action:'App\Http\Controllers\StripeController@Success')->name('success');
// PAYMENTS METHOD INTEGRATION ROUTE END

//NEWSLATTER ROUTE START
Route::resource('newsletter', NewsletterController::class);
//NEWSLATTER ROUTE END

Route::middleware(['admin', 'verified'])->group(function () {

    //DashboardController
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::group(['middleware' => ['can:admin-Product Management','can:admin-Product Campaign']], function () {
        Route::get('product_lists',[DashboardController::class, 'product_lists'])->middleware(['auth', 'verified'])->name('product_lists');
        Route::get('pending-products',[DashboardController::class, 'pendingProducts'])->middleware(['auth', 'verified'])->name('pending.products');
        Route::get('banned-products',[DashboardController::class, 'bannedProducts'])->middleware(['auth', 'verified'])->name('banned.products');
        Route::post('status_product/{id}',[DashboardController::class, 'product_status'])->middleware(['auth', 'verified'])->name('product_status');
        Route::get('delete_product/{id}',[DashboardController::class, 'product_delete'])->middleware(['auth', 'verified'])->name('product_delete');
        Route::post('product_campaign/{id}',[DashboardController::class, 'product_campaign'])->middleware(['auth', 'verified'])->name('product_campaign');
        Route::get('edit_product/{id}',[DashboardController::class, 'product_edit'])->middleware(['auth', 'verified'])->name('product_edit');

        Route::get('super-deal-products',[DashboardController::class, 'super_deal_products'])->middleware(['auth', 'verified'])->name('super.deal.products');
        Route::get('tranding-products',[DashboardController::class, 'trending_products'])->middleware(['auth', 'verified'])->name('trending.products');
        Route::get('flash-sale-products',[DashboardController::class, 'flash_sale_products'])->middleware(['auth', 'verified'])->name('flash.sale.products');
    });

    Route::group(['middleware' => ['can:admin-Product Discussion']], function () {
        Route::get('review',[DashboardController::class, 'reviews'])->name('review');
        Route::get('reports',[DashboardController::class,'report'])->name('report');
        Route::get('view-review/{id}',[DashboardController::class, 'view_reviews'])->name('view.review');
    });

    Route::group(['middleware' => ['can:admin-Order Management']], function () {
        Route::get('admin/order/details/{id}',[DashboardController::class,'OrderDetails'])->name('order.details');
        Route::get('admin/all/order',[DashboardController::class,'AllOrder'])->name('all.order');
        Route::get('admin/delivered-order',[DashboardController::class,'DeliveredOrder'])->name('delivered.order');
        Route::get('admin/pending-order',[DashboardController::class,'PendingOrder'])->name('pending.order');
        Route::get('admin/processing-order',[DashboardController::class,'ProcessingOrder'])->name('processing.order');
        Route::get('admin/canceled-order',[DashboardController::class,'CanceledOrder'])->name('canceled.order');
        Route::get('admin/order/delete/{id}',[DashboardController::class,'OrderDelete'])->name('order.delete');
    });

    Route::group(['middleware' => ['can:admin-Earnings']], function () {
        Route::get('admin/total-earning',[DashboardController::class,'TotalEarning'])->name('total.earning');
        Route::get('admin/tax-earning',[DashboardController::class,'TaxEarning'])->name('tax.earning');
        Route::get('admin/subscription-earning',[DashboardController::class,'SubscriptionEarning'])->name('subscription.earning');
        Route::get('admin/commission-earning',[DashboardController::class,'CommissionEarning'])->name('commission.earning');
        Route::post('admin/year-order-details',[DashboardController::class,'yearInvoiceDownload'])->name('year.invoice.download');
        Route::post('admin/monthly-order-details',[DashboardController::class,'monthlyInvoiceDownload'])->name('monthly.invoice.download');
        Route::post('admin/day-order-details',[DashboardController::class,'dayInvoiceDownload'])->name('day.invoice.download');
        Route::get('admin/invoice-download/{id}', [DashboardController::class, 'invoice_download'])->name('admin.invoice.download');
    });

    //PackagingController Resource
    Route::group(['middleware' => ['can:admin-Packaging']], function () {
        Route::resource('packaging', PackagingController::class);
    });

    //CategoryController Resource
    //SubCategoryController Resource
    Route::group(['middleware' => ['can:admin-Product Catalog']], function () {
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCategoryController::class);
    });

    //SubCategoryController Resource
    Route::group(['middleware' => ['can:admin-Shipping']], function () {
        Route::resource('shipping',ShippingController::class);
    });
    //VendormanagementController Resource
    Route::group(['middleware' => ['can:admin-Vendor Management']], function () {
        Route::resource('vendormanagement', VendorsmanagementController::class);
    });
    //RolemanagementController Resource
    //PermissionController Resource
    //AdminmanagementController Resource
    Route::group(['middleware' => ['can:admin-Admin Management']], function () {

        Route::resource('adminmanagement', AdminmanagementController::class);
        Route::resource('role', RolemanagementController::class);
        // Route::resource('permission', PermissionController::class);
    });
    //CustomermanagementController Resource
    Route::group(['middleware' => ['can:admin-Customer Management']], function () {
        Route::resource('customermanagement', CustomermanagementController::class);
    });

    // All Banner Management Controller
    Route::group(['middleware' => ['can:admin-Pages']], function () {
        Route::get('banner-edit',[BannerController::class,'index'])->name('banner.edit');
        Route::post('shop-page-banner-post',[BannerController::class,'shop_page'])->name('shop.banner.edit');
        Route::post('vendor-page-banner-post',[BannerController::class,'vendor_page'])->name('vendor.banner.edit');
        Route::post('customer-page-banner-post',[BannerController::class,'customer_page'])->name('customer.banner.edit');
        Route::post('cart-page-banner-post',[BannerController::class,'cart_page'])->name('cart.banner.edit');
    });

    // ProfileController
    Route::get('admin/profile', [ProfileController::class, 'admin_profile'])->name('admin.profile');
    Route::get('admin/profile/setting', [ProfileController::class, 'admin_profile_setting'])->name('admin.profile.setting');
    Route::post('admin/profile/setting/edit', [ProfileController::class, 'admin_profile_setting_edit'])->name('admin.profile.setting.edit');
    Route::post('admin/password/change', [ProfileController::class, 'admin_password_change'])->name('admin.password.change');

    //Newslatter Route
    Route::group(['middleware' => ['can:admin-Newsletter Management']], function () {
        Route::get('admin/newsletter-list', [DashboardController::class, 'newslettter'])->name('newsletters');
        Route::post('admin/newsletter-list', [DashboardController::class, 'exportNewslettter'])->name('export.newsletters');
    });
    //General Settings Route
    Route::group(['middleware' => ['can:admin-General Settings']], function () {
        Route::get('general-settings/logo-edit',[GeneralController::class,'logosEdit'])->name('general.logo.edit');
        Route::post('general-settings/header-logo-post',[GeneralController::class,'headerLogoPost'])->name('header.logo.post');
        Route::post('general-settings/footer-logo-post',[GeneralController::class,'footerLogoPost'])->name('footer.logo.post');
        Route::post('general-settings/invoice-logo-post',[GeneralController::class,'invoiceLogoPost'])->name('invoice.logo.post');
        Route::post('general-settings/dashboard-logo-post',[GeneralController::class,'dashboardLogoPost'])->name('dashboard.logo.post');
        Route::post('general-settings/favicon-post',[GeneralController::class,'faviconPost'])->name('favicon.post');
        Route::post('general-settings/dashboard-favicon-post',[GeneralController::class,'DashboardFaviconLogoPost'])->name('dashboard.favicon.post');
        Route::get('general-settings/dashboard-website-content',[GeneralController::class,'websiteContents'])->name('general.website.centent');
        Route::post('general-settings/dashboard-website-content-post',[GeneralController::class,'websiteContentsPost'])->name('general.website.centent.post');

        Route::get('general-settings/dashboard-slider',[GeneralController::class,'generalSlider'])->name('general.slider');
        Route::post('general-settings/dashboard-slider-post',[GeneralController::class,'generalSliderPost'])->name('general.slider.post');
        Route::get('general-settings/dashboard-slider-delete/{id}',[GeneralController::class,'generalSliderDelete'])->name('general.slider.delete');
        Route::get('general-settings/dashboard-slider-edit/{id}',[GeneralController::class,'generalSliderEdit'])->name('general.slider.edit');
        Route::post('general-settings/dashboard-slider-edit-post/{id}',[GeneralController::class,'generalSliderEditPost'])->name('general.slider.edit.post');
        Route::get('general-settings/dashboard-social-link',[GeneralController::class,'socialLink'])->name('general.social.link');
        Route::post('general-settings/dashboard-social-link-post',[GeneralController::class,'socialLinkPost'])->name('general.social.link.post');
        Route::post('general-settings/dashboard-social-link-edit-post/{id}',[GeneralController::class,'socialLinkEditPost'])->name('general.social.link.edit.post');
        Route::get('general-settings/dashboard-social-editt/{id}',[GeneralController::class,'socialLinkEdit'])->name('general.social.edit');
        Route::get('general-settings/dashboard-social-delete/{id}',[GeneralController::class,'socialLinkDelete'])->name('general.social.delete');
        Route::get('general-settings/dashboard-contact-info',[GeneralController::class,'contactInfo'])->name('general.contact.info');
        Route::post('general-settings/dashboard-contact-info-post',[GeneralController::class,'contactInfoPost'])->name('general.contact.info.post');
         //GENERAL SETTINGS ROUTE ENDD
    });


});

require __DIR__.'/auth.php';


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
    });

    Route::group(['middleware' => ['can:vendor-product management']], function () {

        Route::get('vendor/product/upload',[VendorController::class,'vendor_product_upload'])->name('vendor.product.upload');

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



    //Vendor Shipping Route
    Route::resource('vendor-shipping', VendorShippingController::class);

    //Vendor Packaging Route
    Route::resource('vendor-packaging', VendorPackagingController::class);

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
    //UPGRADE SUBCRIPTION ROUTE START
    Route::get('upgrade', [PlanController::class, 'upgrade'])->name('upgrade');
    Route::get('upgrade/{plan}', [PlanController::class, 'upgrade_show'])->name("upgrade.show");
    Route::post('subscription', [PlanController::class, 'upgrade_done'])->name("upgrade.done");
    //UPGRADE SUBCRIPTION ROUTE END
});

// VENDOR ROUTE END


// =========================== ALL COMMON ROUTES START HERE =================



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
});

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






