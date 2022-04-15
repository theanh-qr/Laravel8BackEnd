@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tiêu đề</th>
                        <th>Link</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Cập nhập</th>
                    </tr>
                    <thead>
                    <tbody>
                        @foreach ($sliders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td><a href="{{ $item->url }}">{{ $item->url }}</a></td>
                                <td><img src="{{ $item->img }}" height='100px' width:'50px'></td>
                                <td>{!! App\Http\Services\Slider\SliderService::active($item->active) !!}</td>
                                <th>
                                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Hàm removeRow đc viết trong temblade/admin/js/main.js --}}
                                    <a class="btn btn-danger btn-sm" href="" onclick="removeRow({{ $item->id }},'/admin/sliders/destroy')">
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
        {!! $sliders->links() !!}
    </div>
@endsection
