@extends('layouts.master')

@section('content')
    @component('partials.breadcrumb')
        @slot('heading')
            Admin
        @endslot
        @slot('li_1')
            Admin
        @endslot
        @slot('title')
            Change Password
        @endslot
    @endcomponent
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @component('partials.title_one')
                    @slot('title')
                        Change Password
                    @endslot
                @endcomponent

                <div class="card-body">
                    <!-- create form  -->
                    <form action="{{ route('change.password') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <label for="Name" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="Name" name="password" placeholder="Enter new password" required>
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

