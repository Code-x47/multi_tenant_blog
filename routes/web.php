<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\userAuthController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(userAuthController::class)->group(function() {
Route::view("userReg","users.userReg")->name('user.regForm');
Route::view("userlogin","users.userlogin")->name('user.loginForm');
Route::get('/logout','logout')->name('users.logout');
Route::Post('login','userLogin')->name('users.login');
Route::Post("userReg","userRegister")->name('user.reg');

});


Route::middleware(['auth', 'role:admin'])
->controller(adminController::class)
->group(function () {
    Route::get('adminDash', 'adminDash')->name('admin.dashboard');
    Route::get('update/{id}', 'updateUser')->name('user.update');
});

Route::middleware(['auth','post'])
->controller(PostController::class)
->group(function() {
  Route::get("userDash","index")->name('user.dash');
  Route::Post('create_post','create')->name('create.post');
});


