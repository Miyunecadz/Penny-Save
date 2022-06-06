@extends('layouts.app')

@section('content')
<div class="site-wrap m-2 p-3 d-flex justify-content-center">
    <div class="form-wrap bg-body align-self-center p-5 mt-4 mb-4 rounded-3 shadow">
        <div class="form-innner">
            <h1 class="title">Register</h1>
            <p class="caption">Please fill in all the required information</p>
            <form action="{{ route('save') }}" method="post" class="pt-2">
            
            @if(Session::get('fail'))
                <div class="alert alert-danger mb-2">
                    {{Session::get('fail')}}
                </div>
            @endif
            @if(Session::get('success'))
                <div class="alert alert-success mb-2">
                    {{Session::get('success')}}
                </div>
            @endif

            @csrf
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    <label for="name">Name</label>
                </div>

                <div class="form-floating mt-2">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                    <span class="text-danger">@error('username'){{$message}}@enderror</span>
                    <label for="username">Username</label>
                </div>

                <div class="form-floating mt-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    <label for="password">Password</label>
                </div>

                <div class="form-floating mt-2">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    <span class="text-danger">@error('confirm_password'){{$message}}@enderror</span>
                    <label for="confirm_password">Confirm Password</label>
                </div>

                <div class="d-grid mb-2 mt-3">
                    <button type="submit" class="btn btn-primary shadow-sm">Register</button>
                </div>

                

                <div class="d-flex justify-content-center mt-1">Already have an account?<a href="{{ route('login') }}">Sign in</a> </div>
                
            </form>
        </div>
    </div>
</div>

@endsection
