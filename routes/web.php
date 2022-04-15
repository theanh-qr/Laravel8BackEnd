<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\MainController;
use App\Http\Middleware;

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
//Trang đăng nhập vào admin
Route::get('admin/user/login',[LoginController::class,'index'])->name('login');
//Đăng xuất
Route::get('logout',[LoginController::class,'out'])->name('logout');
//Giử thông tin yêu cầu đăng nhập và kiếm tra đăng nhập
Route::post('admin/user/store',[LoginController::class,'store']);

//Nhưng trang yêu cầu đăng nhập thì mới cho vào
// Route::middleware(['auth'])->group(function(){
//     Route::get('admin',[MainController::class,'index'])->name('adminMain');
// });
//Không cho vào group thì phải có middleware đằng sau
//Route::get('admin/user/main',[MainController::class,'index'])->name('adminMain')->middleware('admin');

//Dùng middleware để check đăng nhập, dùng auth trang admin thuôc middeware và khai báo trong kernel
Route::middleware('admin')->group(function () {

    Route::prefix('admin')->group( function () {


        //ở trên có admin r nên ở dưới chỉ cần ghi /user/main

        //Các trang chính khi đăng nhập dung MainController
        //trang home.blade.php
        Route::get('/user/main',[MainAdminController::class,'index'])->name('home');

        //Trang cá nhân của admin
        Route::get('/user',[MainAdminController::class,'adminBlog'])->name('adminMain');

        //Menu dùng MenuController
        Route::prefix('menus')->group( function () {
            //Thêm danh mục vào db
            Route::get('add',[MenuController::class,'create'])->name('addMenu');
            Route::post('add',[MenuController::class,'store']);
            //Hiện thị danh sách danh mục từ db
            Route::get('list', [MenuController::class,'index'])->name('listMenu');
            //Gọi đến route sửa
            Route::get('edit/{menu}', [MenuController::class,'show']);
            Route::post('edit/{menu}', [MenuController::class,'update']);
            //Gọi đến route xóa
            Route::DELETE('destroy', [MenuController::class,'destroy']);
        });


        //Product dùng ProducController
        Route::prefix('product')->group( function () {
            //Thêm sản phẩm vào db
            Route::get('add',[ProductController::class,'create'])->name('addProduct');
            Route::post('add',[ProductController::class,'store']);
            //Hiển thị danh sách sản phẩm từ db
            Route::get('list', [ProductController::class,'index'])->name('listProduct');
            //Gọi đến route sửa
            Route::get('edit/{product}', [ProductController::class,'show']);
            Route::post('edit/{product}', [ProductController::class,'update']);
            //Gọi đến route xóa
            Route::DELETE('destroy', [ProductController::class,'destroy']);
        });


        //Slider dùng SliderController
        Route::prefix('sliders')->group( function () {
            //Thêm slider vào db
            Route::get('add',[SliderController::class,'create'])->name('addSlider');
            Route::post('add',[SliderController::class,'store']);
            //Hiển thị danh sách slider từ db
            Route::get('list', [SliderController::class,'index'])->name('listSlider');
            //Gọi đến route sửa
            Route::get('edit/{slider}', [SliderController::class,'show']);
            Route::post('edit/{slider}', [SliderController::class,'update']);
            //Gọi đến route xóa
            Route::DELETE('destroy', [SliderController::class,'destroy']);
        });



        //Upload dùng UploadController
        Route::post('upload/services', [UploadController::class, 'store']);
    });
});

Route::get('/', [MainController::class,'index'])->name('/');