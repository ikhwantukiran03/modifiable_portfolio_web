// routes/web.php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;

// Public routes
Route::get('/', [Home::class, 'index'])->name('home');
Route::get('/about', [About::class, 'index'])->name('about.index');
Route::get('/portfolio', [Portfolio::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{id}', [Portfolio::class, 'show'])->name('portfolio.show');
Route::get('/certificates', [Certificate::class, 'index'])->name('certificate.index');
Route::get('/certificates/{id}', [Certificate::class, 'show'])->name('certificate.show');
Route::get('/contact', [Contact::class, 'index'])->name('contact.index');

// Admin routes (These should be protected by authentication middleware in a production environment)
Route::prefix('admin')->group(function () {
    // About routes
    Route::get('/about/create', [About::class, 'create'])->name('about.create');
    Route::post('/about', [About::class, 'store'])->name('about.store');
    Route::get('/about/{id}/edit', [About::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}', [About::class, 'update'])->name('about.update');
    
    // Portfolio routes
    Route::get('/portfolio/create', [Portfolio::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio', [Portfolio::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/{id}/edit', [Portfolio::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{id}', [Portfolio::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{id}', [Portfolio::class, 'destroy'])->name('portfolio.destroy');
    
    // Certificate routes
    Route::get('/certificates/create', [Certificate::class, 'create'])->name('certificate.create');
    Route::post('/certificates', [Certificate::class, 'store'])->name('certificate.store');
    Route::get('/certificates/{id}/edit', [Certificate::class, 'edit'])->name('certificate.edit');
    Route::put('/certificates/{id}', [Certificate::class, 'update'])->name('certificate.update');
    Route::delete('/certificates/{id}', [Certificate::class, 'destroy'])->name('certificate.destroy');
    
    // Contact routes
    Route::get('/contact/create', [Contact::class, 'create'])->name('contact.create');
    Route::post('/contact', [Contact::class, 'store'])->name('contact.store');
    Route::get('/contact/{id}/edit', [Contact::class, 'edit'])->name('contact.edit');
    Route::put('/contact/{id}', [Contact::class, 'update'])->name('contact.update');
});