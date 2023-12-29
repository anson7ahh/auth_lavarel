<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\authentication;

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
route::post('login', [authentication::class, 'login']);
route::group(['middlware' => 'auth:api'], function () {
});
Route::group(['middleware' => 'web'], function () {
    Route::get('userdetail', [authentication::class, 'getUserDetail']);
});
