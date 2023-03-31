<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SubTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubSectorController;
use App\Http\Controllers\SpecificDetailController;

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

// Public Routes
//===================================================================
Route::get('/',[PublicController::class,'index'])->name('public.index');

// Admin Routes
//====================================================================
// Login
Route::get('/keyin',[LoginController::class,'loginForm'])->name('login.form');
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'login'])->name('login.login');
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout')->middleware('AuthAdmin');
Route::get('/change-password',[LoginController::class,'changePasswordForm'])->name('change.password.form')->middleware('AuthAdmin');
Route::post('/change-password',[LoginController::class,'changePassword'])->name('change.password')->middleware('AuthAdmin');

Route::middleware('AuthAdmin')->group(function() {
    Route::resources([
        'categories' => CategoryController::class,
        'sectors' => SectorController::class,
        'specific-detail' => SpecificDetailController::class,
        'sub-sectors' => SubSectorController::class,
        'types' => TypeController::class,
        'sub-types' => SubTypeController::class
    ]);

    // SubType
    Route::get('/sub-types/list/{id}',[SubTypeController::class,'list'])->name('sub_types.list');
    Route::get('/sub-types/contents/{id}',[SubTypeController::class,'contents_by_sub_type'])->name('sub_type.contents');

    // SubSector
    Route::get('/sub-sectors/list/{id}',[SubSectorController::class,'list'])->name('sub_sectors.list');

    // Specific Detail
    Route::get('/ajax/types/{id}',[SpecificDetailController::class,'get_sub_types_of_type'])->name('detail.show_sub_types_of_type'); # ajax route
    Route::get('/ajax/sectors/{id}',[SpecificDetailController::class,'get_sub_sectors_of_sector'])->name('detail.show_sub_sectors_of_sector'); # ajax route
    Route::get('/ajax/get-contents/{id}',[SpecificDetailController::class,'getContents'])->name('detail.getContent');
    Route::get('/contents/{sub_sector_id}',[SpecificDetailController::class,'contents'])->name('subsectors.content');
    Route::get('/contents/category/{cat_id}',[SpecificDetailController::class,'contents_by_category'])->name('contents.category');
});