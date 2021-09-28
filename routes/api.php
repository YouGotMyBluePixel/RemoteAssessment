<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\HtmlController;
use App\Http\Controllers\LinkController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/files', [ManagementController::class, 'getHtml']);
// Route::get('/links', [ManagementController::class, 'getLinks']);
Route::get('/pdfs', [ManagementController::class, 'getPdfs']);

Route::post('/store', [ManagementController::class, 'store']);
Route::post('/storehtml', [ManagementController::class, 'storeHtml']);
// Route::post('/updatehtml', [ManagementController::class, 'updateHtml']);
Route::resource('links', LinkController::class);
Route::resource('/files', HtmlController::class);

