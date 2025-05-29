<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $roles = Role::all();
    return view('dashboard',compact('roles'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {

    // admin|secre
    Route::middleware(['role:admin|secre'])->group(function () {
        
        Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
        Route::get('/usuarios/crear', [UserController::class, 'create'])->name('users.create');
        Route::post('/usuarios', [UserController::class, 'store'])->name('users.store');
    });

    // BODEGA
    Route::middleware(['role:bodega'])->group(function () {
        // Categorías
        Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categorias/crear', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categorias', [CategoryController::class, 'store'])->name('categories.store');

        // Productos
        Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
        Route::get('/productos/crear', [ProductController::class, 'create'])->name('products.create');
        Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
    });

    // CAJERA
    Route::middleware(['role:cajera'])->group(function () {
        Route::get('/ventas', [SaleController::class, 'index'])->name('sales.index');
        Route::get('/ventas/crear', [SaleController::class, 'create'])->name('sales.create');
        Route::post('/ventas', [SaleController::class, 'store'])->name('sales.store');
    });
});
require __DIR__.'/auth.php';
