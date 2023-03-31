@extends('layouts.master')

@include('partials.collapse_dashboard')

@include('partials.sector_active')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            New Sector
        @endslot
        @slot('li_1')
            Sector
        @endslot
        @slot('title')
            Create
        @endslot
    @endcomponent
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @component('partials.title_one')
                    @slot('title')
                        Create Sector
                    @endslot
                @endcomponent
        
                <!-- show message -->
                @include('partials.info')

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('sectors.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="name" placeholder="Enter name" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

