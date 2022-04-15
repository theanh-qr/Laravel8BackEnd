<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    //Trang thêm slider
    public function create()
    {
        return view('admin.slider.add',[
            'title' => 'Thêm Slider mới'
        ]);
    }

    //Giử dữ liệu từ add đi
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'url' => 'required'
        ]);

        $this->sliderService->insert($request);

        return redirect()->back();
    }

    //Hiển thị danh sách slider
    public function index()
    {
        return view(
            'admin.slider.list',
            [
                'title' => 'Danh sách slider',
                'sliders' => $this->sliderService->get(),
            ]
        );
    }

    //Hiển thị trang sửa slider
    public function show(Slider $slider)
    {
        return view(
            'admin.slider.edit',
            [
                'title' => 'Chỉnh sửa slider',
                'slider' => $slider,
            ]
        );
    }

    //Giử thông tin update về data
    public function update(Request $request, Slider $slider)
    {
        //Chuyển dữ liệu đến 'sliderService' và dùng hàm 'update' trong đó để xử lý
        $result = $this->sliderService->update($request, $slider);
        if($result == true)
        {
            return redirect('/admin/sliders/list');
        }
        //Khi update thành công ta chuyển đến trang danh sách list
        return redirect()->back();
    }

    //Xóa dữ liệu theo id
    public function destroy(Request $request)
    {   
        //Lấy dữ liệu của dòng cần xóa cho vào hàm xóa bên MenuService
        $request = $this->sliderService->destroy($request);

        //Nếu xóa thành công thì hiện thông báo
        if($request)
        {
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công',
            ]);
        }
        //Nếu k xóa thành công
        return response()->json([
            'error' => true,
        ]);
    }

}
