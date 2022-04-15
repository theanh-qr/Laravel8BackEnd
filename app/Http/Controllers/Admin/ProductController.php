<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Requests\Product\CreateFormRequest;
use App\Models\Product;

class ProductController extends Controller
{
    //Khởi tạo lại ProductService
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    //Thêm danh sản phẩm
    public function create()
    {
        return view(
            'admin.product.add',
            [
                'title' => 'Thêm sản phẩm mới',
                'menus' => $this->productService->getMenuName()
            ]
        );
    }
    //Validate dữ liệu bằng Product/CreateFormRequest rồi giử request đi thêm data và db khi đạt yêu cầu validata
    public function store(CreateFormRequest $request)
    {
        error_log(json_encode($request));
        $this->productService->create($request);

        return redirect()->back();
    }

    //Hiển thị dữ liệu
    public function index()
    {
        //Lấy dữ liệu hiển thị
        $products = $this->productService->getAll();

        return view(
            'admin.product.list',
            [
                'title' => 'Danh sách danh mục',
                'products' => $products,
            ]
        );
    }

    //Xóa dữ liệu theo id
    public function destroy(Request $request)
    {   
        //Lấy dữ liệu của dòng cần xóa cho vào hàm xóa bên MenuService
        $request = $this->productService->destroy($request);

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
    public function show(Product $product){
        return view(
            'admin.product.edit',
            [
                'title' => 'Chỉnh sửa sản phẩm ' . $product->name,
                'product' => $product,
                //Truyền Danh mục từ menu vào 
                'menuName' => $this->productService->getMenuName(),
            ]
        );
    }
    //Giử dữ liệu đã sửa đi cập nhập vào db
    public function update(Product $product , CreateFormRequest $request){
        //Chuyển dữ liệu đến 'ProductService' và dùng hàm 'update' trong đó để xử lý
        $this->productService->update($request, $product);
        //Khi update thành công ta chuyển đến trang danh sách list
        return redirect('/admin/product/list');
    }
}
