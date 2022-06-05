<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

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

Route::get("/", [IndexController::class, "index"]);
Route::get("/administrator", [AdministratorController::class, "index"]);
Route::resource("barang", BarangController::class);
Route::resource("supplier", SupplierController::class);
Route::resource("kategori", KategoriController::class);