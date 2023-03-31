@extends('layouts.master')

@include('partials.collapse_dashboard')

@include('partials.type_active')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Edit Type
        @endslot
        @slot('li_1')
            Type
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
                        Edit Type
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('types.update',$data->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="text" class="form-control" id="Name" name="name" value="{{ $data->name }}" placeholder="Enter name" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

