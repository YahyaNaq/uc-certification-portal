<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BirthCertificateController;
use App\Http\Controllers\DivorceCertificatesController;
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

Route::post('login', [AuthController::class, 'login']);

Route::prefix('certificates')->group(function () {
    Route::prefix('birth-certificates')->controller(BirthCertificateController::class)->group(function () {
        Route::post('store', 'store');
    });
});


Route::middleware('auth:sanctum')->prefix('certificates')->group(function () {
    Route::prefix('birth-certificates')->controller(BirthCertificateController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('documents', 'getDocuments');
        Route::post('update-status', 'updateStatus');
    });
});
