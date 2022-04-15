@extends('admin.main')

@section('content')
    <form action="/admin/sliders/add" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Tiêu đề</label>
                    {{-- Dùng hàm old để lưu lại các thông tin khi ta giử đi mà nhập sai hay thiếu thì có thể sửa chứ k bị mất --}}
                <input type="text" name="name" value="" class="form-control" placeholder="Nhập tiêu đề">
            </div>


            <div class="form-group">
                <label>Đường dẫn</label>
                    {{-- Dùng hàm old để lưu lại các thông tin khi ta giử đi mà nhập sai hay thiếu thì có thể sửa chứ k bị mất --}}
                <input type="text" name="url" value="" class="form-control" placeholder="Nhập đường dẫn">
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
                <label>Sắp xếp</label>
                <input type="number" name="sort_by" value="1" class="form-control" id="sort_by">
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
                <button type="submit" class="btn btn-primary">Tạo thêm Slider</button>
            </div>
        </div>
        <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection

