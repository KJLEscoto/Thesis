<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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

Route::post('/auth/login-client', [AuthController::class, 'authenticateClient']);
Route::post('/auth/login-admin', [AuthController::class, 'authenticateAdmin']);
Route::post('/auth/register', [AuthController::class, 'create']); 
Route::get('/getUsers', [AuthController::class, 'getUsers']); 


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/admin', function (Request $request) {
    return $request->admin();
});