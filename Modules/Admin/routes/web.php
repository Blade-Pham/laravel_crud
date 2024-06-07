<?php

use App\Http\Middleware\AdminAuthenticate;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\AuthController;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\CategoryController;
use Modules\Admin\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// guard -> nguoi bao ve
// middleware -> phan mem trung gian

// User -> access link admin -> route -> middleware -> guard -> If userLogin -> OK access success
//                            Return message error      <-

Route::group([], function () {

    Route::prefix("admin")->group(function (){

       Route::get("login", [AuthController::class, 'login'])->name("admin.login");
       Route::post('login-post', [AuthController::class, 'loginPost'])->name('admin.login.post');

       Route::get("forget-password", [AuthController::class, 'forgetPassword'])->name("admin.forget_password");

       Route::middleware([AdminAuthenticate::class])->group(function (){
           Route::get('dashboard', function (){
               return view('admin::pages.admin');
           })->name('admin.dashboard');

           Route::post("store", [AdminController::class, 'store'])->name('admin.store');
           Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
           Route::prefix("product")->group(function (){
            Route::get("", [ProductController::class, 'index'])->name('admin.product.index');
            Route::get("create", [ProductController::class, 'create'])->name("admin.product.create");
            Route::get("edit/{id}", [ProductController::class, 'edit'])->name("admin.product.edit");
            Route::post("update/{id}", [ProductController::class, 'update'])->name("admin.product.update");
            Route::post('store', [ProductController::class, 'store'])->name("admin.product.store");
             Route::get('delete/{id}', [ProductController::class, 'destroy'])->name("admin.product.delete");

        });
        Route::prefix("category")->group(function (){
        Route::get("", [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get("create", [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post("store",[CategoryController::class,'store'])->name("admin.category.store");
        Route::get("edit/{id}", [CategoryController::class, 'edit'])->name("admin.category.edit");
        Route::get("delete/{id}", [CategoryController::class, 'destroy'])->name("admin.category.delete");
        Route::post("update/{id}", [CategoryController::class, 'update'])->name("admin.category.update");
        });
        Route::prefix("role")->group(function (){
             Route::get("", [RoleController::class, 'index'])->name('admin.role.index');
            Route::get("create", [RoleController::class, 'create'])->name('admin.role.create');
            Route::post("store",[RoleController::class,'store'])->name("admin.role.store");
            Route::get("edit/{id}", [RoleController::class, 'edit'])->name("admin.role.edit");
            Route::get("delete/{id}", [RoleController::class, 'destroy'])->name("admin.role.delete");
            Route::post("update/{id}", [RoleController::class, 'update'])->name("admin.role.update");
            });

        });


    });
});
