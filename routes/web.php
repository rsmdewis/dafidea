<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BeritaController::class, 'index'])->name('show.berita');
Route::get('/komentar/{id}', [BeritaController::class, 'show'])->name('show.detail');
Route::post('/komentar/{postId}/comments', [BeritaController::class, 'storeComment'])->name('posts.comments.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'is_admin'])->group(function(){
    // Route::get('/admin/dashboard',[AdminController::class,'showDashboard'])->name('admin.dashboard');
    // Route::get('/admin/post',[PostController::class,'showDashboard'])->name('admin.post');
    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('posts.dashboard');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    // Rute untuk menangani form tambah post
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Rute untuk menangani form edit post
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::patch('/posts/{id}', [PostController::class, 'update']); // Opsional untuk patch request

    // Rute untuk menghapus post
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
// Route::middleware('admin')->group(function () {
//     Route::resource('posts', 'PostController');
// });
require __DIR__.'/auth.php';
