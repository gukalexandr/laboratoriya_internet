<?php

use App\Http\Controllers\API\UserController;
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

Route::post('login',[UserController::class,'loginUser']);
Route::get('user_show/{user}',[UserController::class,'show']);
Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::post('user_add',[UserController::class,'store']);
    Route::put('user_edit/{user}',[UserController::class,'update']);
    Route::get('user_delete/{user}',[UserController::class,'destroy']);
});
