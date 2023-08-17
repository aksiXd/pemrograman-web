<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [AuthController::class, 'signIn']);

// Auth
Route::get('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');
Route::get('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/insert-user', [AuthController::class, 'insert'])->name('insert-user');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// User
Route::get('/homepage', [UserController::class, 'homepage'])->name('homepage');
Route::post('/homepage/add-guestbook', [UserController::class, 'addGuestBook'])->name('addGuestBook');
Route::get('/homepage/delete-guestbook/{id}', [UserController::class, 'deleteGuestBook'])->name('deleteGuestBook');
Route::get('/homepage/update-guestbook/{id}', [UserController::class, 'updateGuestBook'])->name('updateGuestBook');
Route::post('/homepage/save-guestbook/{id}', [UserController::class, 'saveGuestBook'])->name('saveGuestBook');
