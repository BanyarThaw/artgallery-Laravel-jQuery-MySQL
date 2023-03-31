@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Error ! </strong> {{$error}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

@if(Session::has('info'))
    <div class="text-center">
        <div class="alert alert-primary alert-dismissible alert-solid alert-label-icon shadow fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>{{ Session::get('info') }}!!!</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif