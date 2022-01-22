<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>
    <div class="back">
        <div class="div-center">


            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('administration.login') }}">
                        @csrf
                        <div class="form-group my-2">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group my-2">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100">Login</button>
                        <hr />
                        <button type="button" class="btn btn-link float-end">Forget your password?</button>
                    </form>
                </div>
            </div>
            </span>
        </div>
</body>

</html>
