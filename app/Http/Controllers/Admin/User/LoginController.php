<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //trả về trang đăng nhập của admin
    public function index()
    {
        return view('admin.user.login',['title' => 'Đăng nhập về hệ thống',]);
    }

    //Giử thông tin yêu cầu đăng nhập nếu Login thành công về trang home
    public function store (Request $request)
    {  
        //kiểm tra điều kiên đăng nhập có đủ không nếu k đưa ra thông báo lỗi
        $this->validate($request,
            [
                'email' => 'required|email:filter',
                'password' => 'required|min:6',
            ]
        );

        //gán giá trị được giử vào từ form vào biến
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->has('remember') ? true : false;

        //Kiểm tra đăng nhập bằng Auth nếu có thì đi tiếp k thì back quay lại
        if(Auth::attempt(['email' => $email,'password' => $password], $remember)){
            $adminName = User::where('email',$email)->value('name');
            // 'adminName',$adminName
            return redirect()->route('home');
        }
        Session::flash('error', 'Email or password false');
        return redirect()->back();
    }

    public function out()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
