<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GanttController;
use \App\Http\Controllers\TaskController;
use \App\Http\Controllers\LinkController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'permission:' . config('const.permissions.ADMIN')]], function () {
    Route::get('/gantt', function () {
        return view('gantt-chart.index');
    });

    Route::prefix('gantt-data')->group(function () {
        Route::get('/data', [GanttController::class ,'get']);
        Route::resource('task', TaskController::class);
        Route::resource('link',  LinkController::class);
    });

});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
