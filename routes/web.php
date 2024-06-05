<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main Routes
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{id}', 'category')->name('category');
});

// Blog Routes
Route::resource('blog', BlogController::class);
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');


// Contact Routes
Route::controller(ContactController::class)->name('contact.')->group(function () {
    Route::get('/contact', 'create')->name('create');
    Route::post('/contact', 'store')->name('store');
});

// Subscribe Route
Route::post('subscriber-store', [SubscriberController::class, 'store'])->name('subscriber.store');

require __DIR__.'/auth.php';
