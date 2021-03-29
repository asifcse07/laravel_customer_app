<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layout.login-header')
</head>
<body>

	<div class="limiter">

            @yield('content')
        <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

	</div>


    @include('layout.login-footer')
    <input type="hidden" class="site_url" value="{{url('/')}}">
</body>
</html>
