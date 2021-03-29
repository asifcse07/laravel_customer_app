@extends('layout.login')
@section('content')
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form class="login100-form validate-form" action="{{ url('/login') }}" method="post">
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
                            <span class="login100-form-title p-b-33">
                                Account Login
                            </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="username" placeholder="username">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn">
                        Sign in
                    </button>
                </div>

            </form>
        </div>
    </div>
