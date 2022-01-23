<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>
    <div class="back">
        <div class="div-center overflow-hidden">

            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('administration.loginPost') }}">
                        @csrf
                        <div class="form-group my-2">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group my-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
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
