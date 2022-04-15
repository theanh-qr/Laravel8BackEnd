<!-- check validate -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- check login false -->

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif

{{-- check success  --}}
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div> 
@endif