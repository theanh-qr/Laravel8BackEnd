<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainAdminController extends Controller
{
    //trang home của admin
    public function index(){
        return view('admin.home',['title' => 'Trang quản trị viên']);
    }

     //trả về trang cá nhân của admin
     public function adminBlog(){
         return view('admin.user.user',['title' => 'Trang cá nhân Admin',]);
     }
}
