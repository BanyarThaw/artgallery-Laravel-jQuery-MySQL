@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/glightbox/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/mystyle.css') }}">
@endsection

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Category Detail List
        @endslot
        @slot('li_1')
            {{ $info->name }}
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
                        {{ $info->name }}
                    @endslot
                    @slot('edit_route')
                        {{ route('categories.edit',$info->id) }}
                    @endslot
                    @slot('delete_route')
                        {{ route('categories.destroy',$info->id) }}
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    @include('partials.contents')
                    <!-- end row -->

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
            c-{{ $info->id }}
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sidebar_active.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/delete.js') }}"></script>
@endsection
