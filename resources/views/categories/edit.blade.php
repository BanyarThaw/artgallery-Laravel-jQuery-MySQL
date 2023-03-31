@extends('layouts.master')

@include('partials.collapse_dashboard')

@include('partials.category_active')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Edit Category
        @endslot
        @slot('li_1')
            Category
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
                        Edit Category
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('categories.update',$data->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
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

