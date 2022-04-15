<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

class UploadController extends Controller
{
    //Hàm lưu file vào public và hiện file ảnh lên form bằng
    public function store(Request $request)
    {

        //Kiểm tra xem file có đc chọn ở form chưa
        if ($request->hasFile('file')) {
            error_log("vao");
            //kiểm tra và trả về đường dẫn nếu file đã đc chọn vào form
            try {

                //Lấy tên file
                $name = $request->file('file')->getClientOriginalName();
                $ext = $request->file('file')->getClientOriginalExtension();

                //Tên file cùng với ngày giờ giử
                $fullName = time() . '_'.$name;
                error_log($name);

                //Tạo đường dẫn cho file khi đc chọn upload
                $pathFull = "uploads/";
                error_log($pathFull);

                //Lấy đượng dẫn mặc định của web
                $url = url()->to('/');
                error_log($url);

                //Đưa file đc chọn vào vào đường dẫn(ở đây đường dẫn file là: public/uploads/y/m/d/namefile) 
                $request->file('file')->move("uploads", $fullName);
            
                //Trả về cái GET của file chuyện về trong folder storage
                return response()->json(["status" => "success", "url" => "$url/uploads/$fullName"]);
            } catch (\Exception $error) {
                error_log($error->getMessage());
                return response()->json(["status" => "danger", "url" => ""]);
            }
        }
    }
}
