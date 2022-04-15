<?php

namespace App\Http\Services\Slider;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Slider;
use Exception;

class SliderService
{
    //Hàm xử lí thêm slider
    public function insert($request)
    {
        try{
            Slider::create([
                'name' => (string) $request->input('name'),
                'url' => (string) $request->input('url'),
                'img' => (string) $request->input('file'),
                'sort_by'=> (integer) $request->input('sort_by'),
                'active' => (integer) $request->input('active')
            ]);
            Session::flash('success', 'Thêm slider thành công');
        }catch(Exception $err){
            Session::flash('error', 'Thêm slider thất bại');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    //Hàm xử lí hiện thị danh sách slider
    public function get()
    {
        return Slider::orderBy('id')->paginate(3);  
    }

    //Lấy thông tin update up vào db
    public function update($request, $slider) : bool
    {
        try{
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập nhập thành công');
        }catch(\Exception $err){
            Session::flash('error', 'Cập nhập thất bại');
            error_log($err->getMessage());
            return false;
        }

        return true;
    }

    //Xoá dữ liệu theo id
    public function destroy($request)
    {   
        //Lấy id của cột cần xóa
        $id = (int) $request->input('id');
        //Lấy thông tin theo id đó
        $slider = Slider::where('id',$id)->first();
        if($slider)
        {
            //Nếu tồn tại biến thì xóa
            return Slider::where('id',$id)->delete();
        }
        //Còn k thì thôi
        return false;
    }



    //Hàm kiểm tra active có hay k
    public static function active($active = 0) : string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">No</span>'
                            : '<span class="btn btn-success btn-xs">Yes</span>';
    }
}