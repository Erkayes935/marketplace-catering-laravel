<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OrderMenuController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

// Halaman utama (Home)
Route::get('/', function () {
    return view('welcome');
});

// Rute autentikasi (gunakan laravel/ui atau breeze sesuai yang dipakai)
Auth::routes();

// Rute untuk Menyediakan CRUD untuk Menu (menggunakan resource controller)
Route::resource('menus', MenuController::class);

// Rute untuk Menyediakan CRUD untuk Order (menggunakan resource controller)
Route::resource('orders', OrderController::class);

// Rute untuk Menyediakan CRUD untuk Invoice (menggunakan resource controller)
Route::resource('invoices', InvoiceController::class);

// Rute untuk Customer (tambah, edit, lihat profil)
Route::resource('customers', CustomerController::class);

// Rute untuk Merchant (tambah, edit, lihat profil)
Route::resource('merchants', MerchantController::class);

// Rute untuk Order-Menu (relasi antara order dan menu)
Route::resource('order_menu', OrderMenuController::class);

// Rute untuk Category (untuk kategori menu, misalnya makanan berat, makanan ringan, dll)
Route::resource('categories', CategoryController::class);

// Rute-rute yang hanya bisa diakses oleh user yang sudah login (auth)
Route::middleware('auth')->group(function () {
    // Bisa ditambahkan rute-rute lain yang hanya bisa diakses user yang login
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
