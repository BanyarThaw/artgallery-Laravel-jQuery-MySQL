@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/glightbox/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/mystyle.css') }}">
@endsection

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Show Detail
        @endslot
        @slot('li_1')
            Detail
        @endslot
        @slot('title')
            Show
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @component('partials.title_two')
                    @slot('title')
                        Detail
                    @endslot
                    @slot('edit_route')
                        {{ route('specific-detail.edit',$data->id) }}
                    @endslot
                    @slot('delete_route')
                        {{ route('specific-detail.destroy',$data->id) }}
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <p class="text-muted">{{ $data->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <p class="text-muted"> {{ $data->category?->name }} </p>
                    </div>
                    <div class="mb-3">
                        <label for="Type" class="form-label">Type</label>
                        <p class="text-muted"> {{ $data->type->name }} </p>
                    </div>
                    <div class="mb-3">
                        <label for="SubTypes" class="form-label">Sub Type</label>
                        <p class="text-muted"> {{ $data->sub_type->name }} </p>
                    </div>
                    <div class="mb-3">
                        <label for="Sector" class="form-label">Sector</label>
                        <p class="text-muted"> {{ $data->sector->name }} </p>
                    </div>
                    <div class="mb-3">
                        <label for="SubSector" class="form-label">Sub Sector</label>
                        <p class="text-muted"> {{ $data->sub_sector->name }} </p>
                    </div>
                    <label for="Content" class="form-label">Content</label>
                    <div class="row gallery-wrapper">
                        @foreach($data->contents as $content)
                            <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                data-category="designing development">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ asset('storage/'.$content->value) }}" title="">
                                            @if($content->content_type == 'photos')
                                                <img class="gallery-img photo_design"

                                                    src="{{ asset('storage/'.$content->value) }}" alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption"></h5>
                                                </div>
                                            @else
                                                <div class="embed-youtube">
                                                    <iframe src="//www.youtube.com/embed/{{ $content->value }}" width="750" height="210"></iframe>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        @endforeach
                    </div>
                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    @component('partials.sidebar_active')
        @slot('active')
            s-{{ $data->sector->id }}
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sidebar_active.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/delete.js') }}"></script>
@endsection
