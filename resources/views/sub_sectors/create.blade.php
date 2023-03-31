@extends('layouts.master')

@include('partials.collapse_dashboard')

@include('partials.sub_sector_active')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            New Sub Sector
        @endslot
        @slot('li_1')
            Sub Sector
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
                        Create Sub Sector
                    @endslot
                @endcomponent

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('sub-sectors.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="name" placeholder="Enter name" required>
                        </div>
                        <label for="Sector" class="form-label">Choose Sector</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="sector_id">
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                        <label for="Logo" class="form-label">Upload Logo</label>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="image" id="formFile" required>
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

