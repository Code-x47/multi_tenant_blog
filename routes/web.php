<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\userAuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(userAuthController::class)->group(function() {
Route::view("userReg","users.userReg")->name('user.regForm');
Route::view("userlogin","users.userlogin")->name('user.loginForm');
Route::Post("userReg","userRegister")->name('user.reg');
Route::view("adminDash","admin.adminDash_template");
Route::view("userDash","users.userDash");
});
