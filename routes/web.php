<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//To home page
Route::get('/',[WelcomeController::class, 'index'])->name('welcome.index');
//To blog page
Route::get('/blog',[BlogController::class, 'index'])->name('blog.index');
//To create a poste page
Route::get('/blog/create',[BlogController::class, 'create'])->name('blog.create');
//To a single post page 
Route::get('/blog/{post:slug}',[BlogController::class, 'show'])->name('blog.single');
//To store data post in Db
Route::post('/blog',[BlogController::class, 'store'])->name('blog.store');
//To about page
Route::get('/about',[WelcomeController::class, 'about'])->name('about');
//To contact index
Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');

//To dashboard page
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
