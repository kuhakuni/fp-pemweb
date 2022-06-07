<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
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

Route::get("/", [IndexController::class, "index"])->middleware("auth");
Route::get("/administrator/{id}", [
    AdministratorController::class,
    "index",
])->middleware("auth");
Route::resource("barang", BarangController::class)->middleware("auth");
Route::resource("supplier", SupplierController::class)->middleware("auth");
Route::resource("kategori", KategoriController::class)->middleware("auth");
Route::get("/login", function () {
    return view("administrator.login");
})
    ->name("login")
    ->middleware("guest");
Route::get("/register", function () {
    return view("administrator.register");
})->middleware("guest");
Route::post("/login", [
    AdministratorController::class,
    "authenticate",
])->middleware("guest");
Route::post("/register", [AdministratorController::class, "store"])->middleware(
    "guest"
);
Route::get("/logout", AdministratorController::class . "@logout")->middleware(
    "auth"
);
Route::put("administrator/{id}", [
    AdministratorController::class,
    "update",
])->middleware("auth");
Route::get("/transaksi", [TransaksiController::class, "index"])->middleware(
    "auth"
);