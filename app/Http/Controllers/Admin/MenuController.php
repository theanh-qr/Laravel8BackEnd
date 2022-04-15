<?php

namespace App\Http\Controllers\Admin;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use Log;

class MenuController extends Controller
{
    //Khởi tạo lại file MenuService trong foder Service
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    //Tạo 1 danh mục mới 
    public function create()
    {
        return view(
            'admin.menu.add',
            [
                'title' => 'Thêm danh mục mới',
                'menus' => $this->menuService->getParent()
            ]
        );
    }

    //Validate các trường trong form danh mục và dùng hảm create trong menuService để thêm dữ liệu vào db
    // public function store(CreateFormRequest $request)
    // {
    //     dd($request->input());
    // }

    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);

        return redirect()->back();
    }

    //Hiển thị dữ liệu
    public function index(Request $request)
    {
        // $page = $request->page;
        // Log::info($page);
        $menus = $this->menuService->getAll();
        // Log::info(json_encode($menus));
        // $total = count($menus);

        return view(
            'admin.menu.list',
            [
                'title' => 'Danh sách danh mục',
                'menus' => $menus,
            ]
        );
    }

    //Xóa dữ liệu theo id
    public function destroy(Request $request)
    {   
        //Lấy dữ liệu của dòng cần xóa cho vào hàm xóa bên MenuService
        $request = $this->menuService->destroy($request);

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

    //Lấy dữ liệu cần sửa hiển thị ra trang cập nhập
    public function show(Menu $menu){
        return view(
            'admin.menu.edit',
            [
                'title' => 'Chỉnh sửa danh mục ' . $menu->name,
                'menu' => $menu,
                'menus' => $this->menuService->getParent()
            ]
        );
    }
    //Giử dữ liệu đã sửa đi cập nhập vào db
    public function update(Menu $menu , CreateFormRequest $request){
        //Chuyển dữ liệu đến 'MenuService' và dùng hàm 'update' trong đó để xử lý
        $this->menuService->update($request, $menu);
        //Khi update thành công ta chuyển đến trang danh sách list
        return redirect('/admin/menus/list');
    }

    
}
