@extends('layouts.app')
@include('layouts.nav')

@section('content')
<div class="mt-5">
    <div class="d-flex justify-content-center">


        <div class="col-md-4">
            <div class="card rounded-3 p-3 shadow">

                @if (Session::has('created'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <div>
                        New piggy bank has been successfully added!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                <h5 class="text-center">New Piggy Bank</h5>
                <form action="{{route('piggy.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Piggy x"
                            value="{{old('name')}}">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="10"
                            rows="3">{{old('description')}}</textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input class="form-control" type="number" name="amount" id="amount"
                                value="{{old('amount')?? 0}}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="range">Range</label>
                            <input class="form-control" type="number" name="range" id="range" value="{{old('range')}}">
                            @error('range')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-2 d-grid">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
