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
use App\Http\Controllers\Admin\AdminRegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

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
Route::get('/nieuws', [NewsController::class, 'index'])->name('news.index');
Route::get('/nieuws/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Registration routes (accessible to everyone)
Route::get('/inschrijvingen/aanmelden', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/inschrijvingen/aanmelden', [RegistrationController::class, 'store'])->name('registrations.store');
Route::get('/inschrijvingen/succes', [RegistrationController::class, 'success'])->name('registrations.success');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User Profile routes
    Route::get('/profiel/bewerken', [UserProfileController::class, 'edit'])->name('profiles.edit');
    Route::patch('/profiel/bewerken', [UserProfileController::class, 'update'])->name('profiles.update');
    Route::get('/profiel/{user}', [UserProfileController::class, 'show'])->name('profiles.show');
});

// Admin routes - middleware wordt hier toegepast op de groep
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faqs', AdminFaqController::class);
    
    // Contact messages
    Route::get('/contact', [AdminContactController::class, 'index'])->name('contact.index');
    Route::patch('/contact/{message}/mark-read', [AdminContactController::class, 'markRead'])->name('contact.mark-read');
    Route::delete('/contact/{message}', [AdminContactController::class, 'destroy'])->name('contact.destroy');
    
    // Registration management
    Route::get('/inschrijvingen', [AdminRegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/inschrijvingen/{registration}', [AdminRegistrationController::class, 'show'])->name('registrations.show');
    Route::patch('/inschrijvingen/{registration}/status', [AdminRegistrationController::class, 'updateStatus'])->name('registrations.update-status');
    Route::delete('/inschrijvingen/{registration}', [AdminRegistrationController::class, 'destroy'])->name('registrations.destroy');
});

require __DIR__.'/auth.php';