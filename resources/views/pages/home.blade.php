@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <div class="alert alert-success px-3 py-5">Selamat Datang ...! @auth{{ Auth::user()->name }} @endauth</div>
            </div>
        </div>
    </div>
@endsection
