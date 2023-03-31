@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/glightbox/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/mystyle.css') }}">
@endsection

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Content
        @endslot
        @slot('li_1')
            {{ $sub_sector->name }}
        @endslot
        @slot('title')
            Content
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @component('partials.title_two')
                    @slot('title')
                        <img class="rounded shadow" alt="35x35" width="35" src="{{ asset('storage/'.$sub_sector->sub_sector_logo) }}">
                    @endslot
                    @slot('edit_route')
                       {{ route('sub-sectors.edit',$sub_sector->id)}}
                    @endslot
                    @slot('delete_route')
                        {{ route('sub-sectors.destroy',$sub_sector->id)}}
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <div class="row gallery-wrapper">
                        @foreach($data as $dt)
                            <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                data-category="designing development">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ asset('storage/'.$dt->value) }}" title="">
                                            @if($dt->content_type == 'photos')
                                                <img class="gallery-img photo_design"
                                                    src="{{ asset('storage/'.$dt->value) }}" alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption"></h5>
                                                    </div>
                                            @else
                                                <div class="embed-youtube">
                                                    <iframe src="//www.youtube.com/embed/{{ $dt->value }}" width="750" height="210" allowfullscreen></iframe>
                                                </div>
                                            @endif
                                        </a>
                                    </div>

                                    @component('partials.box')
                                        @slot('name')
                                            {{ $dt->name }}
                                        @endslot
                                        @slot('edit_route')
                                            {{ route('specific-detail.edit',$dt->id) }}
                                        @endslot
                                        @slot('show_route')
                                            {{ route('specific-detail.show',$dt->id) }}
                                        @endslot
                                        @slot('delete_route')
                                            {{ route('specific-detail.destroy',$dt->id) }}
                                        @endslot
                                        @slot('id')
                                            {{ $dt->id }}
                                        @endslot
                                    @endcomponent
                                </div>
                            </div>
                            <!-- end col -->
                        @endforeach
                    </div>
                    <!-- end row -->

                    <!-- pagination -->
                    @include('partials.pagination_wrap')
                    <!-- end pagination -->
                    
                </div><!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>

    @component('partials.sidebar_active')
        @slot('active')
            s-{{ $sub_sector->sector->id }}
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/js/delete.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sidebar_active.js') }}"></script>
@endsection
