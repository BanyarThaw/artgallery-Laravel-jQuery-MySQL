<?php

use App\Http\Controllers\api\v1\PublicController;
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

Route::get('/header/{title}',[PublicController::class,'header']); 
Route::get('/sub-sectors/{sector_id}',[PublicController::class,'sub_sectors']);
Route::get('/sub-sectors/{sector_id}/more/{lastid}',[PublicController::class,'sub_sectors_more']);
Route::get('/sub-types/{type_id}',[PublicController::class,'sub_types']);
Route::get('/sub-types/{type_id}/more/{lastid}',[PublicController::class,'sub_types_more']);
Route::get('/index/{type}/{id}',[PublicController::class,'index']); 
Route::get('/data/{each_respective_name}/{each_respective_id}/{lastid}',[PublicController::class,'data']); 
Route::get('/show/{id}',[PublicController::class,'show']); 
