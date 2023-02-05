<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BookController2;
use App\Http\Controllers\UserBookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/books/{id}', [BookController::class, 'show']);
// Route::get('/books', [BookController::class, 'index']);

//Route::resource('books', BookController2::class);

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{id}/books', [UserBookController::class, 'index'])->name('users.books.index');



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('books', BookController2::class)->only(['store', 'update', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('books', BookController2::class)->only(['index']);
