@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá gốc</th>
                        <th>Giá khuyến mãi</th>
                        <th>Active</th>
                        <th>Image</th>
                        <th>Remove and fix</th>
                    </tr>
                    <thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->menu->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->price_sale }}</td>
                                <td>{!! App\Http\Services\Product\ProductService::active($item->active) !!}</td>
                                <td><img src="{{ $item->img }}" height='100px' width:'50px'></td>
                                <th>
                                    <a class="btn btn-primary btn-sm" href="/admin/product/edit/{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Hàm removeRow đc viết trong temblade/admin/js/main.js --}}
                                    <a class="btn btn-danger btn-sm" href="" onclick="removeRow({{ $item->id }},'/admin/product/destroy')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
    <div class="paginationWrap">   
        {!! $products->links() !!}
    </div>
@endsection
