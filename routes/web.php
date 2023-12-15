<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupJoinRequestController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Models\Follow;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/index' ,[PostController::class, 'index'])->middleware(['auth', 'verified'])->name('index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');//route that creates a post
    Route::post('/posts', [PostController::class, 'store'])->name('store');//route that stores each post
    Route::get('/posts/{post:title}' ,[PostController::class, 'show'])->middleware(['auth', 'verified'])->name('posts.show');//route that shows a post
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('posts.edit');//route that edits a post
    Route::put('/posts/{post:id}', [PostController::class, 'update'])->middleware('auth', 'verified');//route that updates a post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroy');//route that deletes a post
    //create a comment route for a post
    Route::post('/posts/{post}/comments', [PostCommentController::class, 'store'])->middleware('auth', 'verified')->name('comments.store');
    Route::get('/users/{users}', [UserProfileController::class, 'show'])->middleware('auth', 'verified')->name('users');
    //create a route for groups
    Route::get('/groups', [GroupController::class, 'index'])->middleware(['auth', 'verified'])->name('groups');
    Route::get('/groups/create', [GroupController::class, 'create'])->middleware(['auth', 'verified'])->name('groups.create');
    Route::post('/groups', [GroupUserController::class, 'store'])->middleware(['auth', 'verified'])->name('groups.store');
    Route::get('/groups/{group:title}', [GroupController::class, 'show'])->middleware(['auth', 'verified'])->name('groups.show');
    Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->middleware(['auth', 'verified'])->name('groups.edit');
    Route::put('/groups/{group}', [GroupController::class, 'update'])->middleware(['auth', 'verified'])->name('groups.update');
    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->middleware(['auth', 'verified'])->name('groups.destroy');
    //create a route for group users
    Route::post('/groups/{group:title}/join', [GroupUserController::class, 'join'])->middleware(['auth', 'verified'])->name('groups.join');
    //create a route to request to join a group
    Route::post('/groups/{group}/request/{user}', [GroupUserController::class, 'request'])->middleware(['auth', 'verified'])->name('groups.request');
    //show all pending group requests
    Route::get('/requests', [GroupJoinRequestController::class, 'index'])->middleware(['auth', 'verified'])->name('requests');
    // Route::post('/groups/{group}/accept/{user}', [GroupUserController::class, 'accept'])->middleware(['auth', 'verified'])->name('groups.accept');
    Route::get('/groups/accept/{groupJoinRequest}', [GroupController::class, 'acceptJoinRequest'])->name('groups.accept');
    Route::get('/groups/reject/{groupJoinRequest}', [GroupController::class, 'rejectJoinRequest'])->name('groups.reject');
    //create a route to the Auth user profile
    Route::post('/posts/{post:id}/likes', [PostController::class, 'like'])->middleware(['auth', 'verified'])->name('like');
    Route::delete('/posts/{post:id}/likes', [PostController::class, 'unlike'])->middleware(['auth', 'verified'])->name('unlike');

//Create route for the follow and unfollow
    Route::middleware('auth', 'verified')->group(function () {
        Route::get('/follows', [FollowController::class, 'index'])->name('follows');
        Route::post('/follow/{user}', [FollowController::class, 'store'])->name('follow');
        Route::delete('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
    });
    //create  a route resource for the follow with a route name follows
    // Route::resource('follows', FollowController::class)->middleware(['auth', 'verified']);

    // Route::resource('followers', FollowersController::class)->middleware(['auth', 'verified']);
    Route::get('/profile/{user}', [UserProfileController::class, 'show'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //create a logout route for a user
    Route::post('/logout', [ProfileController::class, 'destroy'])->name('logout');
});


require __DIR__.'/auth.php';
