<?php

use App\Http\Controllers\Dictionary\ImportController;
use Illuminate\Support\Facades\Route;

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

Route::get('file-import', [ImportController::class, 'fileImportExport']);
Route::post('import', [ImportController::class, 'fileImport'])->name('import');
Route::get('crawl', [\App\Http\Controllers\Dictionary\CrawlerController::class, 'crawler'])->name('crawler');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
