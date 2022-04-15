@extends('admin.main')
@section('head')
    {{-- thêm thư viên ckeditor --}}
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="/admin/product/add" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              {{-- Dùng hàm old để lưu lại các thông tin khi ta giử đi mà nhập sai hay thiếu thì có thể sửa chứ k bị mất --}}
              <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="menu_id">
                    @foreach ($menus as $menu )
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Giá gốc</label>
                <input type="number" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="Giá gốc của sản phẩm (VNG)">
            </div>

            <div class="form-group">
                <label>Giá khi đã giảm(Sale)</label>
                <input type="number" name="price_sale" value="{{ old('price_sale') }}" class="form-control" id="price_sale" placeholder="Giá giảm phải nhỏ hơn giá gốc(VNG)">
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="upfile" class="form-control" id="upload">
                <button id="btn-upload" type="button" class="btn btn-success btnUpload">Đăng hình lên</button>
                {{-- Show ảnh --}}
                <div id="image_show"></div>
                {{-- Đường dẫn file --}}
                <input type="hidden" name="file" id="file" value="">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có </label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo thêm sản phẩm</button>
            </div>
        </div>
        <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection

@section('footer')
    <script> 
        CKEDITOR.replace('content');
    </script>
@endsection