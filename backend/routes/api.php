<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::get('/userbyId/{id}', [AuthController::class, 'userbyid']);
    // Route::post('/logout', [AuthController::class, 'logout']);
    // Route::post('/refresh', [AuthController::class, 'refresh']);
    // Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::post('/category', [categoryController::class, 'category']);

Route::get('/threads', [categoryController::class, 'threads']);

Route::get('/threadbyid/{id}', [categoryController::class, 'threadbyid']);

Route::post('/userThreads', [ThreadController::class, 'UserThread']);

Route::get('/userThreads/{id}', [ThreadController::class, 'getThreadData']);

Route::get('getthreaddata/{id}', [ThreadController::class, 'getthreadbyid']);

Route::post('comments', [CommentController::class, 'comments']);

Route::get('/comments/{id}', [CommentController::class, 'getcommentsbyid']);
