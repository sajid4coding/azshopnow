<?php

use App\Http\Controllers\{ProfileController,VendorController};
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

Route::get('/dashboard', function () {
    return view('layouts.dashboardmaster');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::get('admin/profile', [ProfileController::class, 'admin_profile'])->name('admin.profile');
Route::get('admin/profile/setting', [ProfileController::class, 'admin_profile_setting'])->name('admin.profile.setting');
Route::post('admin/profile/setting/edit', [ProfileController::class, 'admin_profile_setting_edit'])->name('admin.profile.setting.edit');

require __DIR__.'/auth.php';


// Vendor All Routes Start
Route::get('become/vendor', [VendorController::class, 'vendor_index'])->name('become.vendor');
Route::post('vendor/post', [VendorController::class, 'vendor_post'])->name('vendor.post');
Route::get('vendor/login', [VendorController::class, 'vendor_login'])->name('vendor.login');
Route::post('vendor/login', [VendorController::class, 'vendor_login_post_form'])->name('vendor.login.post');
Route::get('vendor/dashboard', [VendorController::class, 'vendor_dashboard'])->name('vendor.dashboard');


