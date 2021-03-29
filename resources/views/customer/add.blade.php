@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <h4 class="card-title">Add Customer</h4>
                    <form class="form-horizontal m-t-30 campaignAdFrom" action="{{ url('/save') }}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @if($errors->count() > 0 )
                            <div class="alert alert-danger btn-squared">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <h6>The following errors have occurred:</h6>
                                <ul>
                                    @foreach( $errors->all() as $message )
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('message'))
                            <div class="alert alert-success btn-squared" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @if(Session::has('errormessage'))
                            <div class="alert alert-danger btn-squared" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('errormessage') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control first_name" placeholder="First name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control last_name" placeholder="Last name" name="last_name">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control location_name" placeholder="location name" name="location_name">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-blue btn-success">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection
