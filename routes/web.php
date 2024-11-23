<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.index');
    Route::resource('/kategori', KategoriBarangController::class);
});

Route::middleware(['auth', 'verified', 'role:staff'])->group(function () {
    Route::get('/staff', [DashboardStaffController::class, 'index'])->name('staff.index');
});

require __DIR__ . '/auth.php';
