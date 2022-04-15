<?php

namespace App\Http\Services\Product;
use App\Models\Menu;
use App\Models\Product;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductService
{
    //Lấy tên danh mục từ bang menu
    public function getMenuName()
    {
        return Menu::where('parent_id',0)->get();
    }



    //Check xem giá sale có nhỏ hơn giá gốc k
    protected function isValidPrice($request)
    {
        //lấy giá gốc từ form
        $price = (int)$request->input('price');
        //lấy giá sale từ form
        $price_sale = (int)$request->input('price_sale');

        //Kiểm tra xem giá sale có nhỏ hơn giá gốc k
        if($price != 0 && $price_sale != 0 && $price <= $price_sale)
        {
            Session::flash('error', 'Giá sale phải nhỏ hơn giá gốc');
            return false;
        }

        //Kiểm tra xem giá gốc đã được nhập chưa hoặc có nhỏ hơn 1 không
        if($price != 0 && $price_sale == 0)
        {
            Session::flash('error', 'Giá gốc chưa được nhập hoặc nhỏ hơn 1 VNG');
            return false;
        }

        return true;
    }


    //Đưa dữ liệu khi đăng ký thành công vào bảng menu trong database
    public function create($request)
    {   
        //Dùng hàm kiểm tra giá ở trên
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice === false)
        {
            return false;
        }
        
        //Cách đưa toàn bộ vào cùng 1 lúc
        //Bắt lỗi khi đưa dữ liệu vào db
        // try
        // {
        //     //bỏ token khi create all
        //     $request->except('_token');
        //     //Đưa toàn bộ thông tin vào bảng trong db
        //     Product::create($request->all());
        //     Session::flash('success','Thêm sản phẩm thành công');
        // }catch(\Exception $err){
        //     Session::flash('error',$err->getMessage());
        //     return false; 
        // }
        // return true;
        

        //Cách 2
        //Cách đưa từng thành phần
        //Bắt lỗi khi đưa dữ liệu vào db
        try{
            //bỏ token khi create all
            $request->except('_token');
            //Đưa toàn bộ thông tin vào bảng trong db
            Product::create([
                'name' => (string) $request->input('name'),
                'menu_id' => (int) $request->input('menu_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'price' => (int) $request->input('price'),
                'price_sale' => (int) $request->input('price_sale'),
                'img' => (string) $request->input('file'),
            ]);

            Session::flash('success','Thêm sản phẩm thành công');        
        }catch(\Exception $err){
            Session::flash('error',"Thêm sản phâm thất bại");
            $err->getMessage();
            return false; 
        }
        return true;
    }

    //Lấy toàn bộ dữ liệu
    public function getAll()
    {
        //Gọi function menu trong Model Product bằng hàm with
        return Product::with('menu')->orderby('id')->paginate(2);
    }



    //Xoá dữ liệu theo id
    public function destroy($request)
    {   
        //Lấy id của cột cần xóa
        $id = (int) $request->input('id');
        //Lấy thông tin theo id đó
        $product = Product::where('id',$id)->first();
        if($product)
        {
            //Nếu tồn tại biến thì xóa
            return Product::where('id',$id)->delete();
        }
        //Còn k thì thôi
        return false;
    }

    //Update dữ liệu theo dữ liệu chỉnh sửa được giử đi
    public function update($request, $product) : bool
    {   
        //Dùng hàm fill quét toàn bộ thông tin mà request đã nhận tức là lấy toàn bộ các input chứ k phải từng cái
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice == false)
        {
            return false;
        }

        try{
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhập thành công');
        }catch(\Exception $err){
            Session::flash('error', 'Cập nhập thất bại');
            error_log($err->getMessage());
            return false;
        }

        return true;
    }

    //Hàm kiểm tra active có hay k
    public static function active($active = 0) : string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">No</span>'
                            : '<span class="btn btn-success btn-xs">Yes</span>';
    }
}