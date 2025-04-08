<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\apiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::Post('login',[apiController::class,"login"]);

Route::Post('/logout', [apiController::class, 'logout'])->middleware('auth:sanctum');
Route::get("/show/{post}",[apiController::class, 'show'])->middleware('auth:sanctum');
Route::get("/showAll",[apiController::class, 'showAll'])->middleware('auth:sanctum');
Route::Post('create',[apiController::class, 'create'])->middleware('auth:sanctum');
Route::PUT('update/{id}',[apiController::class, 'update'])->middleware('auth:sanctum');
Route::Delete("delete/{id}",[apiController::class, 'delete'])->middleware('auth:sanctum');



