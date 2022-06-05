@extends('layouts.app')
@include('layouts.nav')

@section('content')
    <div class="mt-5 row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded-3 p-3 shadow">
                <h5 class="text-center">New Piggy Bank</h5>
                <form action="{{route('piggy.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control"  type="text" name="name" id="name" placeholder="Piggy x" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="10" rows="3">{{old('description')}}</textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input class="form-control"  type="number" name="amount" id="amount" value="{{old('amount')?? 0}}" min="0">
                        </div>
                        <div class="form-group">
                            <label for="range">Range</label>
                            <input class="form-control"  type="number" name="range" id="range" value="{{old('range')}}">
                        </div>
                    </div>

                    <div class="form-group mt-2 d-grid">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
