<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\apiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 //Public Route
Route::Post('login',[apiController::class,"login"]);
Route::Post('apiRegister',[apiController::class,"Register"]);

//Protected Routes For Blog Posts
Route::middleware(['auth:sanctum'])
->controller(apiController::class)
->group(function() {
   Route::Post('/logout', 'logout')->name('post.logout');
   Route::get("/show/{post}",'show')->name('post.show');
   Route::get("/showAll", 'showAll')->name('post.showAll');
   Route::Post('create','create')->name('post.create');
   Route::PUT('update/{id}','update')->name('post.update');
   Route::Delete("delete/{id}",'delete')->name('post.delete');
});




