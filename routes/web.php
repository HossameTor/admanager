<?php

use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\banndates;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\duplicateController;
use App\Http\Controllers\bannieresDatesController;

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

Route::get('position/{name}',[PositionController::class, 'getPosition']);
Route::get('/', function () {
    return redirect('/admin');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/duplicate/banniere/{id}',[duplicateController::class,'show'])->name('welcome');
Route::post('/duplicate/banniere/{id}',[duplicateController::class,'duplicate'])->name('postdup');
Route::post('/bannvues',[bannViews::class,'count']);