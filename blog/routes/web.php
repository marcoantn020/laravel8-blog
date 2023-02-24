<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.info');
Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');


Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post');

Route::get('/tag/{tag}', [TagController::class, 'show'])->name('tag');


Route::get('/login/user', [LoginController::class, 'index'])->name('login.user');
Route::post('/login/user', [LoginController::class, 'store'])->name('login.user.store')->middleware('throttle:3');
Route::get('/logout/user', [LoginController::class, 'destroy'])->name('login.user.destroy');

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('profile.posts');
Route::get('/admin/edit_post/{post}', [AdminController::class, 'edit'])->middleware('auth')->name('edit.post');
Route::put('/admin/update_post/{post}', [AdminController::class, 'update'])->middleware('auth')->name('post.update');
Route::get('/admin/destroy_post/{post}', [AdminController::class, 'destroy'])->middleware('auth')->name('post.destroy');
Route::get('/admin/create_post', [AdminController::class, 'create'])->middleware('auth')->name('post.create');
Route::post('/admin/create_post', [AdminController::class, 'store'])->middleware('auth')->name('post.store');

Route::get('/admin/user/{id}', [AdminUserController::class, 'show'])->middleware('auth')->name('user.show');
Route::get('/admin/user/edit/{user}', [AdminUserController::class, 'edit'])->middleware('auth')->name('user.edit');
Route::put('/admin/user/{user}', [AdminUserController::class, 'update'])->middleware('auth')->name('user.update');
Route::put('/admin/password/{user}', [AdminUserController::class, 'update'])->middleware('auth')->name('password.update');


Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('home');
});


require __DIR__.'/auth.php';
