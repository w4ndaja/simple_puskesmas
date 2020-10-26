@extends('layouts.app')
@section('title', 'Edit Pegawai')
@section('content')
<div class="container py-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{route('employees.update', $employee->id)}}" method="post" novalidate>
                    <div class="card-header">Edit Pegawai</div>
                    <div class="card-body">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-md-3 my-1"> <label>ID Pegawai</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="code" class="form-control @error('code') border-danger @enderror" value="{{ $employee->code ?? old('code') }}">
                                @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Nama Pegawai</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="name" class="form-control @error('name') border-danger @enderror" value="{{ $employee->name ?? old('name') }}">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-3 my-1"> <label>Username Pegawai</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="username" class="form-control @error('username') border-danger @enderror" value="{{ $employee->username ?? old('username') }}">
                                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Password Pegawai</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="password" name="password" class="form-control @error('password') border-danger @enderror" value="{{ old('password') }}">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
