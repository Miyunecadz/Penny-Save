@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') . ' - ' . Str::title(Route::currentRouteName()) }}</title>
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
    <script src="{{asset('./js/app.js')}}"></script>
</head>
<body>
    <div class="site-wrap m-2 p-3 d-flex justify-content-center">
        <div class="form-wrap bg-body align-self-center p-5 mt-5 rounded-3 shadow">
            <div class="form-innner">
                <h1 class="title">Login</h1>
                <p class="caption">Please enter your login details to sign in</p>
                <form action="{{ route('check') }}" method="post" class="pt-2">
                
                @if(Session::get('fail'))
                    <div class="alert alert-danger mb-2">
                        {{Session::get('fail')}}
                    </div>
                @endif

                @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{$message}}@enderror</span>
                        <label for="username">Username</label>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        <label for="password">Password</label>
                    </div>

                    <div class="d-grid mb-4 mt-3">
                        <button type="submit" class="btn btn-primary shadow-sm"> Log in</button>
                    </div>

                    

                    <div class="d-flex justify-content-center mt-5">Don't have an account?<a href="{{ route('register') }}">Sign up</a> </div>
                    <div class="d-flex justify-content-center p-1">
                        <a href="#">Forgot password?</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
