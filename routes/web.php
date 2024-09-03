<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
     return view('welcome');

});


//user login
Route::get('/login',[AuthController::class,'loginForm']);
Route::post('/login-post',[AuthController::class,'postLogin'])->name('user.login');


Route::middleware(['check'])->group(function(){
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('user.dashboard');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');


    //users
    Route::get('/users',[UserController::class,'usesrs'])->name('users');

    //roles
    Route::get('/roles',[RoleController::class,'roles'])->name('roles');
    Route::get('/role/edit/{id}',[RoleController::class,'roleEdit'])->name('role.edit');
    Route::post('/role-permission/store/{id}',[RoleController::class,'rolePermissionStore'])->name('role.permission.store');
});
