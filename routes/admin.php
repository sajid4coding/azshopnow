<?php
use App\Http\Controllers\{ProfileController, CategoryController, CustomerController, FrontEndController, HomeController, VendorsmanagementController, VendorController, SubCategoryController, AdminmanagementController, AnnouncementController, AttributeController, BannerController,BlogController, CustomermanagementController, DashboardController, InventoryController, ProductController, ShippingController, StripeController, PackagingController, NewsletterController, PlanController, VendorPackagingController, VendorShippingController, GeneralController, PageController, PermissionController, RolemanagementController, StaffmanagementController, VendorContact};
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['admin', 'verified'])->group(function () {

    //DashboardController
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('markasread',[DashboardController::class, 'markasread'])->middleware(['auth', 'verified'])->name('markasread');
    Route::get('productmarkasread',[DashboardController::class, 'productmarkasread'])->middleware(['auth', 'verified'])->name('productmarkasread');
    Route::get('ordermarkasread',[DashboardController::class, 'ordermarkasread'])->middleware(['auth', 'verified'])->name('ordermarkasread');
    Route::get('all-notification',[DashboardController::class, 'allNotification'])->middleware(['auth', 'verified'])->name('all.notification');
    Route::get('delete-notification',[DashboardController::class, 'deleteNotification'])->middleware(['auth', 'verified'])->name('delete.notification');

    Route::group(['middleware' => ['permission:admin-Product Management|admin-Product Campaign']], function () {
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
        Route::get('manage-order/order-details/{id}',[DashboardController::class,'OrderDetails'])->name('order.details');
        Route::post('manage-order/order-details-post/{id}',[DashboardController::class,'OrderDetailsPost'])->name('order.details.post');
        Route::get('manage-order/all-order',[DashboardController::class,'AllOrder'])->name('all.order');
        Route::get('manage-order/delivered-order',[DashboardController::class,'DeliveredOrder'])->name('delivered.order');
        Route::get('manage-order/pending-order',[DashboardController::class,'PendingOrder'])->name('pending.order');
        Route::get('manage-order/processing-order',[DashboardController::class,'ProcessingOrder'])->name('processing.order');
        Route::get('manage-order/canceled-order',[DashboardController::class,'CanceledOrder'])->name('canceled.order');
        Route::get('manage-order/order-delete/{id}',[DashboardController::class,'OrderDelete'])->name('order.delete');
    });

    Route::group(['middleware' => ['can:admin-Earnings']], function () {
        Route::get('manage-earning/total-earning',[DashboardController::class,'TotalEarning'])->name('total.earning');
        Route::get('manage-earning/tax-earning',[DashboardController::class,'TaxEarning'])->name('tax.earning');
        Route::get('manage-earning/subscription-earning',[DashboardController::class,'SubscriptionEarning'])->name('subscription.earning');
        Route::get('manage-earning/commission-earning',[DashboardController::class,'CommissionEarning'])->name('commission.earning');
        Route::post('manage-earning/year-order-details',[DashboardController::class,'yearInvoiceDownload'])->name('year.invoice.download');
        Route::post('manage-earning/monthly-order-details',[DashboardController::class,'monthlyInvoiceDownload'])->name('monthly.invoice.download');
        Route::post('manage-earning/day-order-details',[DashboardController::class,'dayInvoiceDownload'])->name('day.invoice.download');
        Route::get('manage-earning/invoice-download/{id}', [DashboardController::class, 'invoice_download'])->name('admin.invoice.download');
    });

    //PackagingController Resource
    Route::group(['middleware' => ['can:admin-Packaging']], function () {
        Route::resource('manage-packaging/packaging', PackagingController::class);
    });

    //CategoryController Resource
    //SubCategoryController Resource
    Route::group(['middleware' => ['can:admin-Product Catalog']], function () {
        Route::resource('manage-category/category', CategoryController::class);
        Route::resource('manage-subcategory/subcategory', SubCategoryController::class);
    });

    //SubCategoryController Resource
    Route::group(['middleware' => ['can:admin-Shipping']], function () {
        Route::resource('manage-shipping/shipping',ShippingController::class);
    });
    //VendormanagementController Resource
    Route::group(['middleware' => ['can:admin-Vendor Management']], function () {
        Route::resource('vendormanagement', VendorsmanagementController::class);
        Route::get('manage-payout/payout', [VendorsmanagementController::class, 'payout'])->name('payout');
        Route::get('manage-payout/payout-request', [VendorsmanagementController::class, 'payout_request'])->name('payout.request');
        Route::post('manage-payout/get-paid/{id}', [VendorsmanagementController::class, 'get_paid'])->name('payout.request.get.paid');
        Route::get('manage-payout/payout-request-accepted/{id}', [VendorsmanagementController::class, 'payout_request_accepted'])->name('payout.request.accepted');
        Route::get('manage-payout/payout-request-declined/{id}', [VendorsmanagementController::class, 'payout_request_declined'])->name('payout.request.declined');
        Route::get('manage-commission/commission', [VendorsmanagementController::class, 'commission'])->name('commission');
        Route::post('manage-commission/commission-save', [VendorsmanagementController::class, 'commission_save'])->name('commission.save');
        Route::post('manage-commission/minimum-seller-amount-withdraw-save', [VendorsmanagementController::class, 'minimum_seller_amount_withdraw'])->name('minimum.seller.amount.withdraw');
        Route::get('vendor-management/payment-setting', [VendorsmanagementController::class, 'payment_setting'])->name('payment.setting');
        Route::post('vendor-management/payment-setting-selected', [VendorsmanagementController::class, 'payment_setting_select'])->name('payment.setting.select');
    });
    //RolemanagementController Resource
    //PermissionController Resource

    //AdminmanagementController Resource
    Route::group(['middleware' => ['can:admin-Admin Management']], function () {
        Route::resource('adminmanagement', AdminmanagementController::class);
    });

    //RolemanagementController Resource
    Route::group(['middleware' => ['can:admin-staff Management']], function () {
        Route::resource('role', RolemanagementController::class);
        // Route::resource('permission', PermissionController::class);
    });

    //CustomermanagementController Resource
    Route::group(['middleware' => ['can:admin-Customer Management']], function () {
        Route::resource('customermanagement', CustomermanagementController::class);
    });

    // ProfileController
    Route::get('admin/profile', [ProfileController::class, 'admin_profile'])->name('admin.profile');
    Route::get('admin/profile/setting', [ProfileController::class, 'admin_profile_setting'])->name('admin.profile.setting');
    Route::post('admin/profile/setting/edit', [ProfileController::class, 'admin_profile_setting_edit'])->name('admin.profile.setting.edit');
    Route::post('admin/password/change', [ProfileController::class, 'admin_password_change'])->name('admin.password.change');

    //Newslatter Route
    Route::group(['middleware' => ['can:admin-Newsletter Management']], function () {
        Route::get('manage-subscriber/newsletter-list', [DashboardController::class, 'newslettter'])->name('newsletters');
        Route::post('manage-subscriber/newsletter-list', [DashboardController::class, 'exportNewslettter'])->name('export.newsletters');
    });
    //General Settings Route
    Route::group(['middleware' => ['can:admin-General Settings']], function () {
        Route::get('general-settings/logo-edit',[GeneralController::class,'logosEdit'])->name('general.logo.edit');
        Route::post('general-settings/favicon-post',[GeneralController::class,'faviconPost'])->name('favicon.post');
        Route::post('general-settings/logo-post',[GeneralController::class,'LogoPost'])->name('logo.post');
        // Route::post('general-settings/header-logo-post',[GeneralController::class,'headerLogoPost'])->name('header.logo.post');
        // Route::post('general-settings/footer-logo-post',[GeneralController::class,'footerLogoPost'])->name('footer.logo.post');
        Route::post('general-settings/invoice-logo-post',[GeneralController::class,'invoiceLogoPost'])->name('invoice.logo.post');
        // Route::post('general-settings/dashboard-logo-post',[GeneralController::class,'dashboardLogoPost'])->name('dashboard.logo.post');
        // Route::post('general-settings/dashboard-favicon-post',[GeneralController::class,'DashboardFaviconLogoPost'])->name('dashboard.favicon.post');
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

        // All Banner Management Controller
        Route::get('banner-edit',[BannerController::class,'index'])->name('banner.edit');
        Route::post('shop-page-banner-post',[BannerController::class,'shop_page'])->name('shop.banner.edit');
        Route::post('vendor-page-banner-post',[BannerController::class,'vendor_page'])->name('vendor.banner.edit');
        Route::post('customer-page-banner-post',[BannerController::class,'customer_page'])->name('customer.banner.edit');
        Route::post('cart-page-banner-post',[BannerController::class,'cart_page'])->name('cart.banner.edit');

        Route::get('general-settings/401',[GeneralController::class,'Error401'])->name('401.error');
        Route::get('general-settings/403',[GeneralController::class,'Error403'])->name('403.error');
        Route::get('general-settings/404',[GeneralController::class,'Error404'])->name('404.error');
        Route::get('general-settings/502',[GeneralController::class,'Error502'])->name('502.error');
        Route::get('general-settings/503',[GeneralController::class,'Error503'])->name('503.error');
        Route::get('general-settings/error',[GeneralController::class,'errorPage'])->name('error.page');


        //GENERAL SETTINGS ROUTE END
        //CHAT SYSTEM ROUTE START
            Route::get('chat/admin',[DashboardController::class,'chatAdmin'])->name('chat.admin');
        //CHAT SYSTEM ROUTE END
    });

    Route::group(['middleware' => ['can:admin-delivery boy Management']], function () {

        //DELIVERY BOY ROUTE START
        Route::get('manage-delivery-boy/delivery-boy-add',[DashboardController::class,'deliveryBoyAdd'])->name('delivery.boy.add');
        Route::post('manage-delivery-boy/delivery-boy-post',[DashboardController::class,'deliveryBoyPost'])->name('delivery.boy.post');
        Route::get('manage-delivery-boy/delivery-boy-list',[DashboardController::class,'deliveryBoyList'])->name('delivery.boy.list');
        Route::get('manage-delivery-boy/delivery-boy-edit/{id}',[DashboardController::class,'deliveryBoyEdit'])->name('delivery.boy.edit');
        Route::get('manage-delivery-boy/delivery-boy/out-of-work/{id}',[DashboardController::class,'deliveryBoyOutOfWork'])->name('delivery.boy.out.of.work');
        Route::get('manage-delivery-boy/out-of-work-list',[DashboardController::class,'deliveryBoyOutOfWorkList'])->name('delivery.boy.out.of.work.list');
        Route::post('manage-delivery-boy/delivery-boy/out-of-work-post/{id}',[DashboardController::class,'deliveryBoyOutOfWorkPost'])->name('delivery.boy.out.work.post');
        Route::post('manage-delivery-boy/delivery-boy-post/{id}',[DashboardController::class,'deliveryBoyEditPost'])->name('delivery.boy.edit.post');
        Route::get('manage-delivery-boy/delivery-boy-delete/{id}',[DashboardController::class,'deliveryBoyDelete'])->name('delivery.boy.delete');
        //DELIVERY BOY ROUTE END
    });

    Route::group(['middleware' => ['can:admin-Product Return']], function () {
        Route::get('product-return',[DashboardController::class,'productReturn'])->name('product.return');
        Route::get('productreturn-view/{id}',[DashboardController::class,'productReturnView'])->name('product.return.view');
        Route::delete('product-return-delete/{id}',[DashboardController::class,'productReturnDelete'])->name('product.return.delete');
        Route::get('ordermarkasread-return',[DashboardController::class, 'ordermarkasreadreturn'])->middleware(['auth', 'verified'])->name('ordermarkasread.return');
    });
    
    Route::group(['middleware' => ['can:admin-announcement Management']], function () {
        //ACCOUNCEMENT ROUTE START
        Route::resource('announcement', AnnouncementController::class);
        //ACCOUNCEMENT ROUTE END
    });

    Route::group(['middleware' => ['can:admin-Blog Management']], function () {
        //BlogController
        Route::resource('blog', BlogController::class);
        Route::get('blog-category',[BlogController::class,'blogCategoryAdd'])->name('blog.category.add');
        Route::post('blog-categoryadd',[BlogController::class,'blogCategoryPost'])->name('blog.category.post');
        Route::delete('blog-categorydelete/{id}',[BlogController::class,'blogCategoryDelete'])->name('blog.category.delete');
        Route::get('blog-category-edit/{id}',[BlogController::class,'blogCategoryedit'])->name('blog.category.edit');
        Route::post('blog-category-edit/{id}',[BlogController::class,'blogCategoryeditPost'])->name('blog.category.edit.post');
        Route::resource('pages', PageController::class);
    });


});
