<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

// RUTAS DE DIRECTORIO
Route::get('/', [DirectoryController::class, 'index'])->name('home');
Route::get('/directory/contacts', [DirectoryController::class, 'contacts_dir'])->name('directory.contacts');
Route::get('/directory/institutions',[DirectoryController::class,'institutions_dir'])->name('directory.institutions');
Route::get('/directory/categories',[DirectoryController::class,'categories_dir'])->name('directory.categories');
Route::get('/directory/subcategories',[DirectoryController::class,'subcategories_dir'])->name('directory.subcategories');
Route::get('/directory/divisions',[DirectoryController::class,'divisions_dir'])->name('directory.divisions');

Route::middleware('auth')->group(function () {

    Route::resource('contact', ContactController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('institution', InstitutionController::class);

    /*Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); */
});

require __DIR__.'/auth.php';
