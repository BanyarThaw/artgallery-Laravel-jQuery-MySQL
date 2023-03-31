@extends('layouts.master')
    
@include('partials.collapse_dashboard')

@include('partials.sub_sector_active')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Sub Sector List
        @endslot
        @slot('li_1')
            Sub Sector
        @endslot
        @slot('title')
            List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @component('partials.title_one')
                    @slot('title')
                        Sub Sectors
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <!-- group 1-->
                    <div class="col-lg-12 list-group nested-list nested-sortable">
                        <div class="row">
                            <div class="col-lg-12 list-group-item nested-1">
                                <div class="list-group nested-list nested-sortable">
                                    @foreach($data as $dt)
                                        @component('partials.box-two')
                                            @slot('name')
                                                {{ $dt->name }} <b>[ {{ $dt->sector->name }} ]</b>
                                            @endslot
                                            @slot('edit_route')
                                                {{ route('sub-sectors.edit',$dt->id) }}
                                            @endslot
                                            @slot('delete_route')
                                                {{ route('sub-sectors.destroy',$dt->id) }}
                                            @endslot
                                            @slot('id')
                                                {{ $dt->id }}
                                            @endslot
                                        @endcomponent
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- end card-body -->

                    <!-- pagination -->
                    @include('partials.pagination_wrap')
                    <!-- end pagination -->

                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/js/delete.js') }}"></script>
@endsection