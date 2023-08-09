<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProdCategoriaController;
use App\Http\Controllers\ProdMarcaController;
use App\Http\Controllers\ProdUnidadController;
use App\Http\Controllers\TasaController;
use App\Http\Controllers\InvDepositoController;
use App\Http\Controllers\InventarioController;


/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});*/
Route::get('/', function () {
    return Inertia::render('Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    
    Route::resource('users', UserController::class)->names('users');
    Route::resource('empresas', EmpresaController::class)->names('empresas');
    Route::resource('productos', ProductoController::class)->names('productos');
    Route::resource('prod-categorias', ProdCategoriaController::class)->names('prod-categorias');
    Route::resource('prod-marcas', ProdMarcaController::class)->names('prod-marcas');
    Route::resource('prod-unidads', ProdUnidadController::class)->names('prod-unidads');
    Route::resource('tasas', TasaController::class)->names('tasas');
    Route::resource('inv-depositos', InvDepositoController::class)->names('inv-depositos');
    Route::resource('inventarios', InventarioController::class)->names('inventarios');
        
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
