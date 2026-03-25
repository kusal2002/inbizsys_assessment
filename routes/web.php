<?php

use App\Http\Controllers\SupplierController;
use App\Livewire\Suppliers;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/suppliers', Suppliers::class)->name('suppliers.index');

    Route::get('/suppliers/print', [SupplierController::class, 'print'])
        ->name('suppliers.print');

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
