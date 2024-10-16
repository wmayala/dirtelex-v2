<?php

use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckActiveUser;
use App\Http\Controllers\RandomLinkController;
use App\Http\Middleware\RestrictRouteAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// RUTAS DE DIRECTORIO
Route::get('/', [DirectoryController::class, 'contacts_dir'])->name('home');
Route::get('/directory/contacts', [DirectoryController::class, 'contacts_dir'])->name('directory.contacts');
Route::get('/directory/contacts/{id}', [DirectoryController::class, 'contacts_show'])->name('directory.contacts_show');
Route::get('/directory/institutions',[DirectoryController::class,'institutions_dir'])->name('directory.institutions');
Route::get('/directory/institutions/{id}',[DirectoryController::class,'institutions_show'])->name('directory.institutions_show');
Route::get('/directory/categories',[DirectoryController::class,'categories_dir'])->name('directory.categories');
Route::get('/directory/categories/{id}',[DirectoryController::class,'categories_show'])->name('directory.categories_show');
Route::get('/directory/subcategories',[DirectoryController::class,'subcategories_dir'])->name('directory.subcategories');
Route::get('/directory/subcategories/{id}',[DirectoryController::class,'subcategories_show'])->name('directory.subcategories_show');
Route::get('/directory/divisions',[DirectoryController::class,'divisions_dir'])->name('directory.divisions');
Route::get('/directory/divisions/{id}',[DirectoryController::class,'divisions_show'])->name('directory.divisions_show');

// Acceso a ruta generada
Route::get('/register-new/{token}', [RandomLinkController::class, 'redirect'])->name('random.link');

Route::get('/404', function(){
    return view('layouts.404');
})->name('error');

// RUTAS DE ADMINISTRACIÓN
Route::middleware('auth', CheckActiveUser::class)->group(function () {
    Route::resource('contact', ContactController::class);
    Route::resource('institution', InstitutionController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('division', DivisionController::class);
    //Route::resource('user', UserController::class);

    // Ruta para generar link de registro
    Route::post('/generate-link', [RandomLinkController::class, 'generate'])->name('generate.random.link');
});

Route::middleware('auth', CheckActiveUser::class, RestrictRouteAccess::class)->group(function () {
    Route::resource('user', UserController::class);
});

require __DIR__.'/auth.php';
