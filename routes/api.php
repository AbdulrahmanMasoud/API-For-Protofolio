<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EmployerController;
use App\Http\Controllers\API\SkillsController;
use App\Http\Controllers\API\ServicesController;
use App\Http\Controllers\API\TestemonialController;
use App\Http\Controllers\API\BlogsController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    // User Group API
    Route::prefix('user')->group(function () {
        Route::get('/', [EmployerController::class, 'index']);
        Route::put('/edit', [EmployerController::class, 'update']);
    });
    
    // Skills Group API
    Route::prefix('skills')->group(function () {
        Route::get('/', [SkillsController::class, 'index']);
        Route::post('/add', [SkillsController::class, 'store']);
        Route::put('/edit/{id}', [SkillsController::class, 'update']);
        Route::delete('/delete/{id}', [SkillsController::class, 'destroy']);
    });

    // Services Group API
    Route::prefix('services')->group(function () {
        Route::get('/', [ServicesController::class, 'index']);
        Route::get('/{id}', [ServicesController::class, 'show']);
        Route::post('/add', [ServicesController::class, 'store']);
        Route::put('/edit/{id}', [ServicesController::class, 'update']);
        Route::delete('/delete/{id}', [ServicesController::class, 'destroy']);
    });

    // Testemonials Group API
    Route::prefix('testemonials')->group(function () {
        Route::get('/', [TestemonialController::class, 'index']);
        Route::get('/{id}', [TestemonialController::class, 'show']);
        Route::post('/add', [TestemonialController::class, 'store']);
        Route::put('/edit/{id}', [TestemonialController::class, 'update']);
        Route::delete('/delete/{id}', [TestemonialController::class, 'destroy']);
    });

    // Blogs Group API
    Route::prefix('blogs')->group(function () {
        Route::get('/', [BlogsController::class, 'index']);
        Route::get('/{id}', [BlogsController::class, 'show']);
        Route::post('/add', [BlogsController::class, 'store']);
        Route::put('/edit/{id}', [BlogsController::class, 'update']);
        Route::delete('/delete/{id}', [BlogsController::class, 'destroy']);
    });
});
