@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/mystyle.css') }}">
@endsection

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            New Specific Detail
        @endslot
        @slot('li_1')
            Specific Detail
        @endslot
        @slot('title')
            Create
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @component('partials.title_one')
                    @slot('title')
                        Create Specific Detail
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('specific-detail.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="name" placeholder="Enter name" required>
                        </div>
                        <label for="Category" class="form-label">Choose Category</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="choose_category" name="category_id">
                            <option value="null" selected>Choose</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="Sector" class="form-label">Choose Sector</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="sectors" name="sector_id" onchange="choose('sectors')">
                            <option value="null" selected>Choose</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                        <label for="SubSector" class="form-label">Choose Sub Sector</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="choose_sub_sectors" name="sub_sector_id">
                            <option value="null"></option>
                        </select>
                        <label for="Type" class="form-label">Choose Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="types" name="type_id" onchange="choose('types')">
                            <option value="null" selected>Choose</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <label for="SubType" class="form-label">Choose Sub Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="choose_sub_types" name="sub_type_id">
                            <option value="null"></option>
                        </select>
                        <label for="ContentType" class="form-label">Choose Content Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="choose_content_type" onchange="chooseContentType()" name="content_type">
                            <option value="null" selected>Choose</option>
                            <option value="photos">Photos</option>
                            <option value="youtube_link">Youtube Video</option>
                        </select>
                        <div class="mb-3" id="upload_photos">
                            <!--
                                <input type="file" name="photos[]" id="file" multiple>
                            -->
                            <div class="form-group">
                                <label for="images"> Upload Photos ( Maximum upload image number is 15 )
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </label>
                                <div class="input-images" id="images"></div>
                            </div>
                        </div>
                        <div class="mb-3" id="upload_youtube_link">
                            <label for="youtube" class="form-label">Youtube Video Id</label>
                            <input type="text" class="form-control" id="Name" name="youtube_link" placeholder="Enter Youtube Video Id">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/js/choose.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/prevent_enter.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/script.js') }}"></script>
@endsection

@section('script-bottom')
    <script>
        // image uploader
        $(".input-images").imageUploader({
            maxSize: 2 * 1024 * 1024,
            maxFiles: 15,
        });
    </script>
@endsection
