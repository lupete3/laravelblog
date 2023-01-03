<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
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
//To edit a post  
Route::put('/blog/{post}/update',[BlogController::class, 'update'])->name('blog.update');
//To show edit a post page  
Route::get('/blog/{post}/edit',[BlogController::class, 'edit'])->name('blog.edit');
//To show delete a post page  
Route::delete('/blog/{post}/delete',[BlogController::class, 'delete'])->name('blog.delete');
//To store data post in Db
Route::post('/blog',[BlogController::class, 'store'])->name('blog.store');
//To about page
Route::get('/about',[WelcomeController::class, 'about'])->name('about');
//To contact index
Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');

//Post Resources
Route::resource('/categories', CategoryController::class);

//The ressource controller above under the hood
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/categories/{category}', [CategoryController::class, 'delete'])->name('categories.delete');

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
