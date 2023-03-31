@extends('layouts.master')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Edit Specific Detail
        @endslot
        @slot('li_1')
            Specific Detail
        @endslot
        @slot('title')
            Edit
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @component('partials.title_one')
                    @slot('title')
                        Edit Specific Detail
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('specific-detail.update',$specific_detail->id) }}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="name" value="{{ $specific_detail->name }}" placeholder="Enter name" required>
                        </div>
                        <label for="Category" class="form-label">Category</label>
                            @foreach($categories as $category)
                                @if($category->id == $specific_detail->category_id)
                                    <input type="text" name="" value="{{ $category->name }}" class="form-control mb-3" disabled>
                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                @endif
                            @endforeach
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="Sector" class="form-label">Choose Sector</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="sectors" name="sector_id" onchange="choose('sectors')">
                            <option value="null" selected>Choose</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}" {{ $specific_detail->sector_id == $sector->id ? 'selected' : ''}}>{{ $sector->name }}</option>
                            @endforeach
                        </select>
                        <label for="SubSector" class="form-label">Choose Sub Sector</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="choose_sub_sectors" name="sub_sector_id">
                            @foreach($sub_sectors as $sub_sector)
                                <option value="{{ $sub_sector->id }}" {{ $specific_detail->sub_sector_id == $sub_sector->id ? 'selected' : ''}}>{{ $sub_sector->name }}</option>
                            @endforeach
                        </select>
                        <label for="Type" class="form-label">Choose Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="types" name="type_id" onchange="choose('types')">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ $specific_detail->type_id == $type->id ? "selected" : "" }}
                                >
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="SubType" class="form-label">Choose Sub Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="choose_sub_types" name="sub_type_id">
                            @foreach($sub_types as $sub_type)
                                <option value="{{ $sub_type->id }}"
                                    {{ $specific_detail->sub_type_id == $sub_type->id ? "selected" : "" }}
                                >
                                    {{ $sub_type->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="content_type" value="{{ $contents['0']['content_type'] }}">
                        @if ($contents['0']['content_type'] == 'photos')
                            <div class="mb-3 d-block" id="upload_photos">
                                <!--
                                    <input type="file" name="photos[]" id="file" multiple>
                                -->
                                <div class="form-group">
                                    <label for="images"> Upload Photos ( Maximum upload image number is 15 )
                                    </label>
                                    <div class="input-images" id="images"></div>
                                </div>
                            </div>
                        @else
                            @foreach ($contents as $content)
                            <div class="mb-3 d-block" id="upload_youtube_link">
                                <label for="youtube" class="form-label">Youtube Video Id</label>
                                <input type="text" class="form-control" value="{{ $content['value'] }}" id="Name" name="youtube_link" placeholder="Enter Youtube Video Id">
                            </div>
                            @endforeach
                        @endif

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    @component('partials.sidebar_active')
        @slot('active')
            s-{{ $specific_detail->sub_sector_id }}
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/js/choose.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/prevent_enter.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sidebar_active.js') }}"></script>
@endsection

@section('script-bottom')
    <script>
        $.ajax({
            url: `/ajax/get-contents/${` {{ $specific_detail->id }} `}`,
        }).done(function(response){
            if(response){
                console.log(response);
                $('.input-images').imageUploader({
                    preloaded: response,
                    imagesInputName: 'images',
                    preloadedInputName: 'old',
                    maxSize: 2 * 1024 * 1024,
                    maxFiles: 15
                })
            }
        })
    </script>
@endsection
