@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/glightbox/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/mystyle.css') }}">
@endsection

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            {{ $info->type->name }}
        @endslot
        @slot('li_1')
            {{ $info->name }}
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
                        {{ $info->name }}
                    @endslot
                    @slot('edit_route')
                        {{ route('sub-types.edit',$info->id) }}
                    @endslot
                    @slot('delete_route')
                        {{ route('sub-types.destroy',$dt->id) }}
                    @endslot
                @endcomponent
        
                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <!-- show sub sectors -->
                    @include('partials.contents')

                    <!-- pagination -->
                    @include('partials.pagination_wrap')
                </div>
            </div>  
        </div>
    </div>
    <!-- end row -->
    
    @component('partials.sidebar_active')
        @slot('active')
            t-{{ $info->type->id }}
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sidebar_active.js') }}"></script>
@endsection