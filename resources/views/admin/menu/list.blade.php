@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th>Update</th>
                        <th>Remove and fix</th>
                    </tr>
                    <thead>
                    <tbody>
                        @foreach ($menus as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{!! App\Http\Services\Menu\MenuService::active($item->active) !!}</td>
                                <td>{{ $item->updated_at }}</td>
                                <th>
                                    <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Hàm removeRow đc viết trong temblade/admin/js/main.js --}}
                                    <a class="btn btn-danger btn-sm" href="" onclick="removeRow({{ $item->id }},'/admin/menus/destroy')">
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
        {!! $menus->links() !!}
    </div>
@endsection
