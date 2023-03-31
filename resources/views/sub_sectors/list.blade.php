@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/glightbox/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/mystyle.css') }}">
@endsection

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Sub Sector Detail List
        @endslot
        @slot('li_1')
            {{ $sector->name }}
        @endslot
        @slot('title')
            List
        @endslot
    @endcomponent
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @component('partials.title_two')
                    @slot('title')
                        {{ $sector->name }}
                    @endslot
                    @slot('edit_route')
                        {{ route('sectors.edit',$sector->id) }}
                    @endslot
                    @slot('delete_route')
                        {{ route('sectors.destroy',$sector->id) }}
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                     <!-- show sub sectors -->
                    <div class="row gallery-wrapper">
                        @foreach($data as $dt)
                            <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"  data-category="designing development">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ asset('storage/'.$dt->sub_sector_logo) }}" title="">
                                            <img class="gallery-img photo_design" src="{{ asset('storage/'.$dt->sub_sector_logo) }}" alt="" />
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption"></h5>
                                            </div>
                                        </a>
                                    </div>

                                    @component('partials.box')
                                        @slot('name')
                                            {{ $dt->name }}
                                        @endslot
                                        @slot('edit_route')
                                            {{ route('sub-sectors.edit',$dt->id) }}
                                        @endslot
                                        @slot('show_route')
                                            {{ route('subsectors.content',$dt->id) }}
                                        @endslot
                                        @slot('delete_route')
                                            {{ route('sub-sectors.destroy',$dt->id) }}
                                        @endslot
                                        @slot('id')
                                            {{ $dt->id }}
                                        @endslot
                                    @endcomponent
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- end sub sectors -->

                    <!-- pagination -->
                    @include('partials.pagination_wrap')
                    <!-- end pagination -->
                    
                </div>
            </div>  
        </div>
    </div>
    <!-- end row -->

    @component('partials.sidebar_active')
        @slot('active')
            s-{{ $sector->id }}
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/js/delete.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sidebar_active.js') }}"></script>
@endsection
