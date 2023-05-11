<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;

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

/**
 * Public routes. Without middleware
 */
Route::get('/', [TestimonialController::class, 'testimonialList'])->name('home');
Route::get('/services', [CategoryController::class, 'categoriesList']);
Route::get('/aboutme', [Controller::class, 'aboutMe']);
Route::get('/gallery', [GalleryController::class, 'indexPublic'])->name('publicsite.gallery');
Route::post('/gallery', [GalleryController::class, 'indexPublic'])->name('filter.gallery');



Route::get('/adminka', function () {
    return view('dashboard.dashStart');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'avatarUpd'])->name('profile-avatar.update');

    Route::get('/createtestimonial', [TestimonialController::class, 'create']);
    Route::post('/createtestimonial', [TestimonialController::class, 'store']);

    Route::post('/createcomment/{gallery_id}', [CommentController::class, 'store']);
    Route::post('/destroycomment/{comment_id}', [CommentController::class, 'destroy']);

    

    Route::middleware('admin')->group(function () {
        /**
         * Routes to handle users
         */
        Route::get('/listUsers', [UserController::class, 'index']);

        Route::get('/adduser', [UserController::class, 'create']);
        Route::post('/adduser', [UserController::class, 'store']);

        Route::get('/edituser/{user}', [UserController::class, 'edit']);
        Route::post('/edituser/{user}', [UserController::class, 'update']);
        Route::post('/deleteuser/{user}', [UserController::class, 'destroy']);

    }); // ends Route::middleware('admin')->group(function () {
    
    /**
     * These routes are accessible for manager and admin as well.
     */
    Route::middleware(['manager'])->group(function () {
        /**
         * Routes to handle categories
         */
        Route::get('/listCategories', [CategoryController::class, 'index'])->name('catList');

        Route::get('/addcategory', [CategoryController::class, 'create']);
        Route::post('/addcategory', [CategoryController::class, 'store']);

        Route::get('/editcategory/{category}', [CategoryController::class, 'edit']);
        Route::post('/editcategory/{category}', [CategoryController::class, 'update']);
        Route::post('/deletecategory/{category}', [CategoryController::class, 'destroy']);

        /**
         * Routes to handle testimonials
         */
        Route::get('/listtestimonials', [TestimonialController::class, 'index']);
        Route::post('/deletetestimonial/{testimonial}', [TestimonialController::class, 'destroy']);

        /**
         * Routes to handle comments
         */
        Route::get('/listcomments', [CommentController::class, 'index']);
        Route::post('/deletecomment/{comment}', [CommentController::class, 'destroy']);
        

        /**
         * Routes to handle gallery
         */
        Route::get('/listimages', [GalleryController::class, 'index']);
        Route::post('/listimages', [GalleryController::class, 'index'])->name('filter.gallery.dashboard');

        Route::get('/addimage', [GalleryController::class, 'create']);
        Route::post('/addimage', [GalleryController::class, 'store']);

        Route::post('/publishimage/{imageId}', [GalleryController::class, 'publishImage']);

        Route::post('/editimage/{image}', [GalleryController::class, 'update'])->name('editimage');
        Route::delete('/deleteimage/{image}', [GalleryController::class, 'destroy']);

    }); // ends Route::middleware(['admin', 'manager'])->group(function () {

    
    


}); // ends Route::middleware('auth')->group(function () {




require __DIR__.'/auth.php';
