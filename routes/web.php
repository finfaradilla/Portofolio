<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::post('tambahAlamat', [AddressController::class, 'store'])->middleware('auth');
Route::get('address', [AddressController::class, 'index'])->middleware('auth');
Route::get('addresses/create', [AddressController::class, 'create'])->middleware('auth');
Route::get('addresses/{id}/edit', [AddressController::class, 'edit'])->middleware('auth');
Route::put('addresses/{id}', [AddressController::class, 'update'])->middleware('auth');
Route::get('addresses/{id}/delete', [AddressController::class, 'destroy'])->middleware('auth');
Route::delete('addresses/{id}', [AddressController::class, 'destroy'])->middleware('auth');
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
});
