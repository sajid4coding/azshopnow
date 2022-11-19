<?php

use App\Http\Controllers\{ProfileController, CategoryController};
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
});

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

require __DIR__.'/auth.php';

















//CategoryController Resource
Route::resource('category', CategoryController::class);
