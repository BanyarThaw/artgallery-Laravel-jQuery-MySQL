@extends('layouts.master')

@include('partials.collapse_dashboard')

@include('partials.sub_type_active')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Edit Sub Type
        @endslot
        @slot('li_1')
            Sub Type
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
                        Edit Sub Type
                    @endslot
                @endcomponent

                <!-- show message -->
                @include('partials.info')
            
                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('sub-types.update',$data->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" value="{{ $data->name }}" name="name" placeholder="Enter name">
                        </div>
                        <label for="Name" class="form-label">Choose Sub Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="type_id">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ $data->type_id == $type->id ? "selected" : "" }}
                                >
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

