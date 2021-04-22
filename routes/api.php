<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Form;

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
Route::get('/form', [FormController::class, 'index']);
Route::get('/form/search', [FormController::class, 'search']);
Route::get('/form/{id}', [FormController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/form', [FormController::class, 'store']);
    Route::put('/form/{id}', [FormController::class, 'update']);
    Route::delete('/form/{id}', [FormController::class, 'destroy']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/roles', function (Request $request) {
        return response()->json($request->user()->roles()->get());
    })->middleware('role:tester');;


    Route::get('/user', function (Request $request) {
       return $request->user();

    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
