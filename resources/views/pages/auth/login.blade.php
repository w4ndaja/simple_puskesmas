@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        @error('login') <div class="alert alert-danger">{{$message}}</div> @enderror
                        <form action="{{route('authenticate')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control @error('username') border-danger @enderror" value="{{ old('username') }}">
                                @error('username') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control @error('password') border-danger @enderror">
                                @error('password') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button btn btn-success">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
