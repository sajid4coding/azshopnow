<?php
use App\Http\Controllers\{ProfileController, CategoryController, CustomerController, FrontEndController, HomeController, VendorsmanagementController, VendorController, SubCategoryController, AdminmanagementController, AnnouncementController, AttributeController, BannerController,BlogController, CustomermanagementController, DashboardController, InventoryController, ProductController, ShippingController, StripeController, PackagingController, NewsletterController, PlanController, VendorPackagingController, VendorShippingController, GeneralController, PageController, PermissionController, RolemanagementController, StaffmanagementController, VendorContact};
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Routing\RouteGroup;
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
    Route::get('/post-blog',[FrontEndController::class,'postBlog'])->name('post.blog');
    Route::get('blog-post/{id}/{title}',[FrontEndController::class,'singleBlogPost'])->name('blog.single.post');


    Route::post('/getStateCode',[FrontEndController::class,'stateTex']);
    Route::post('checkout_post',[FrontEndController::class,'checkout_post'])->name('checkout_post');
    Route::get('single/product/{id}/{title}',[FrontEndController::class,'single_product'])->name('single.product');
    Route::post('report-product/{id}',[FrontEndController::class,'report_product'])->name('report.product');
    Route::get('top-selection',[FrontEndController::class,'topSelection'])->name('top.selection');
    Route::get('new-arrivals',[FrontEndController::class,'newArrivals'])->name('new.arrivals');
    Route::get('search',[FrontEndController::class,'search'])->name('search');
    Route::post('price-filter',[FrontEndController::class,'priceFilter'])->name('price.filter');
    Route::get('product-sorting',[FrontEndController::class,'productSorting'])->name('product.sorting');


    Route::get('front-pages/{id}', [FrontEndController::class,'front_pages'])->name('front.pages');
// FrontEnd ROUTE END

// PAYMENTS METHOD INTEGRATION ROUTE START

//STRIPE ROUTE START
    Route::get('stripe/checkout/post',[StripeController::class,'checkout'])->name('stripe_checkout_post');
    Route::get('/success',action:'App\Http\Controllers\StripeController@Success')->name('success');
//STRIPE ROUTE END

// PAYMENTS METHOD INTEGRATION ROUTE END

//NEWSLATTER ROUTE START
    Route::resource('newsletter', NewsletterController::class);
//NEWSLATTER ROUTE END

require __DIR__.'/auth.php';

// =========================== ALL COMMON ROUTES START HERE =================

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






