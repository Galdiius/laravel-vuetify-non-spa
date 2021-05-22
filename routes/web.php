<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('login')->group(function(){
    Route::get('/', [CrudController::class,"index"]);
    Route::get('/create',[CrudController::class,"create"]);
    Route::post('/create',[CrudController::class,"store"]);
    Route::delete('/delete/{slug}',[CrudController::class,"delete"]);
    Route::get('/detail/{slug}',[CrudController::class,"detail"]);
    Route::get('/update/{slug}',[CrudController::class,"update"]);
    Route::post('/update/{id}',[CrudController::class,'_update']);
    Route::get('/logout',[AuthController::class,'logout']);
});
Route::middleware('isLogin')->group(function(){
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'_login']);
    Route::get('/register',[AuthController::class,'register']);
    Route::post('/register',[AuthController::class,'_register']);
});
