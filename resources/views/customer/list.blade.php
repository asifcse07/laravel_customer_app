@extends('layout.master')
@section('content')
    <style>
        .hidden {
            display: none !important;
        }
    </style>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <?php $reverse = ($sort_by == 'asc') ? 'desc' : 'asc';?>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Customers</h4>
                        <h6 class="card-subtitle">Customer Lists.</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><a href="{{ Request::fullUrlWithQuery(['sort' => 'firstname', 'sortBy' => $reverse]) }}">First name</a></th>
                                <th scope="col"><a href="{{ Request::fullUrlWithQuery(['sort' => 'lastname', 'sortBy' => $reverse]) }}">Last name</a></th>
                                <th scope="col"><a href="{{ Request::fullUrlWithQuery(['sort' => 'location_name', 'sortBy' => $reverse]) }}">Location</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($customer_all_data))
                                <?php $page=isset($_GET['page'])? ($_GET['page']-1):0;?>
                                @foreach($customer_all_data as $key => $data)
                                    <tr>
                                        <td>{{ ($key+1+($perPage*$page)) }}</td>
                                        <td>{{ $data['firstname'] }}</td>
                                        <td>{{ $data['lastname'] }}</td>
                                        <td>{{ $data['Location']['location_name'] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td colspan="4">No Data available</td>
                                </tr>
                            @endif
                            </tbody>

                        </table>
                        <div style="height: 50px !important;">
                            <?php echo isset($pagination) ? $pagination:"";?>
                        </div>


                    </div>

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
