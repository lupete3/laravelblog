<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
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

//Route::get('/', function () {
//   return view('welcome');
// });

//To welcome page
Route::get('/',[WelcomeController::class, 'index'])->name('welcome.index');

//To blog page
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

//To single blog post page
Route::get('/blog/single-blog-post', [BlogController::class, 'show'])->name('blog.single');

//To about page
Route::get('/about', [WelcomeController::class, 'about'])->name('about');

//To contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');