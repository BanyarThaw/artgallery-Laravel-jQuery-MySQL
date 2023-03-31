@extends('layouts.master')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Sub Type Detail List
        @endslot
        @slot('li_1')
            {{ $type->name }}
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
                        {{ $type->name }}
                    @endslot
                    @slot('edit_route')
                        {{ route('types.edit',$type->id) }}
                    @endslot
                    @slot('delete_route')
                        {{ route('types.destroy',$type->id) }}
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <!-- show list -->
                 <div class="card-body">
                    <!-- group 1-->
                    <div class="col-lg-12 list-group nested-list nested-sortable">
                        <div class="row">
                            <div class="col-lg-12 list-group-item nested-1">
                                <div class="list-group nested-list nested-sortable">
                                    @foreach($data as $dt)
                                        <div class="list-group-item nested-2">
                                            <div class=" align-items-center d-flex">
                                                <p class="mb-0 flex-grow-1">{{ $dt->name }}</p>
                                                <div class="flex-shrink-0">
                                                    <a href="{{ route('sub_type.contents', $dt->id) }}">
                                                        <i class="bx bx-show-alt fs-20"></i>
                                                    </a>
                                                    <a href="{{ route('sub-types.edit', $dt->id) }}">
                                                        <i class="bx bx-edit-alt fs-20"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="confirmAction('deleteForm{{$dt->id}}')">
                                                        <i class="bx bx-trash fs-20"></i>
                                                    </a>
                                                    <form id="deleteForm{{$dt->id}}" action="{{ route('sub-types.destroy',$dt->id) }}" class="d-none" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div><!-- end card header -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                    
                    <!-- pagination -->
                    @include('partials.pagination_wrap')

                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    @component('partials.sidebar_active')
        @slot('active')
            t-{{ $type->id }}
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/js/delete.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sidebar_active.js') }}"></script>
@endsection
