<?php

namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService
{   
    // Lấy  dữ liệu trong db và hiểm thị ra ngoài(lấy theo parent_id)
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    //Lấy toàn bộ dữ liệu
    public function getAll()
    {   
        //Hàm orderbyDesc lấy dữ liệu từ dưới lên
        return Menu::orderby('id')->paginate(2);
        // return Menu::orderby('id')->get();
    }



    //Đưa dữ liệu khi đăng ký thành công vào bảng menu trong database
    public function create($request)
    {   
        //Bắt lỗi khi đưa dữ liệu vào db
        try{
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'slug' => Str::slug($request->input('name'),'-')
            ]);

            Session::flash('success','Taọ danh mục thành công');        
        }catch(\Exception $err){
            Session::flash('error',$err->getMessage());
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
        $menu = Menu::where('id',$id)->first();
        if($menu)
        {
            //Nếu tồn tại biến thì xóa
            return Menu::where('id',$id)->orWhere('parent_id', $id)->delete();

        }
        //Còn k thì thôi
        return false;
    }

    //Update dữ liệu theo dữ liệu chỉnh sửa được giử đi
    public function update($request, $menu) : bool
    {   
        //Dùng hàm fill quét toàn bộ thông tin mà request đã nhận tức là lấy toàn bộ các input chứ k phải từng cái
        //$menu->fill($request->input());
        //Lấy từng trường input vào từng cột trong cơ sở dữ liệu

        if($request->input('parent_id') != $menu->id)
        {
            //Kiểm tra nếu parent_id không bằng id thì mới cho update còn k thì k cho 
            //Bới vì ở parent_id đang tự chọn chính mình nên k cần sửa
            $menu->parent_id = (int) $request->input('parent_id');
        }

        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');

        Session::flash('success', 'Cập nhập thành công');
        //Dùng hàm save để lưu toàn bộ vào
        $menu->save();

        return true;
    }

    //Hàm kiểm tra active có hay k
    public static function active($active = 0) : string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">No</span>'
                            : '<span class="btn btn-success btn-xs">Yes</span>';
    }

}