<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\userAuthController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\PostController;

/*Route::get('/', function () {
    return view('welcome');
});*/

//This Route Is Responsile For Users Login And Registration For Every user including Admins
Route::controller(userAuthController::class)->group(function() {
Route::view("userReg","users.userReg")->name('user.regForm');
Route::view("/","users.userlogin")->name('user.loginForm');
Route::get('/logout','logout')->name('users.logout');
Route::Post('login','userLogin')->name('users.login');
Route::Post("userReg","userRegister")->name('user.reg');

});

//This Route Is Responsible For Admin Dashboard Management Operations
Route::middleware(['auth', 'role:admin'])
->controller(adminController::class)
->group(function () {
    Route::get('adminDash', 'adminDash')->name('admin.dashboard');
    Route::get('update/{id}', 'updateUser')->name('user.update');
    Route::get("delete/{user}","delete")->name('user.delete');
    Route::get("toggleStatus/{id}","toggleStatus")->name('user.toggleStatus');
});

//This Route Is Responsible For Blog Post Management: This where CRUD Operations are Controlled.
Route::middleware(['auth','post'])
->controller(PostController::class)
->group(function() {
  Route::get("userDash","index")->name('user.dash');
  Route::Post('create_post','create')->name('create.post');
  Route::get("edit/{post}",'edit')->name('post.edit');
  Route::Post("update","update")->name("post.update");
  Route::get("/postdelete/{id}","deletePost")->name("post.delete");
});




