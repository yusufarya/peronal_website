<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user', [UserApiController::class, 'index']);
Route::get('/user/{id}', [UserApiController::class, 'show']);
Route::post('/addUser', [UserApiController::class, 'store']);
Route::post('/editUser/{id}', [UserApiController::class, 'update']);
Route::delete('/deleteUser/{id}', [UserApiController::class, 'destroy']);
