<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    $users = collect();
    
    if (auth()->check()) {
        if (auth()->user()->isAdmin()) {
            // Admin ziet alle gebruikers
            $users = \App\Models\User::all();
        } else {
            // Gewone gebruiker ziet alleen andere gewone gebruikers (geen admins)
            $users = \App\Models\User::where('role', 'user')->get();
        }
    }
    
    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Public routes
Route::get('/profiles/{user}', [UserProfileController::class, 'show'])->name('profiles.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User profile management
    Route::get('/my-profile/edit', [UserProfileController::class, 'edit'])->name('profiles.edit');
    Route::patch('/my-profile', [UserProfileController::class, 'update'])->name('profiles.update');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faqs', AdminFaqController::class);
    Route::get('contact-messages', [AdminContactController::class, 'index'])->name('contact.index');
    Route::get('contact-messages/{contactMessage}', [AdminContactController::class, 'show'])->name('contact.show');
    Route::patch('contact-messages/{contactMessage}/mark-read', [AdminContactController::class, 'markAsRead'])->name('contact.mark-read');
    Route::delete('contact-messages/{contactMessage}', [AdminContactController::class, 'destroy'])->name('contact.destroy');
});

require __DIR__.'/auth.php';