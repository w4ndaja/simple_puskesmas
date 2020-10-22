@extends('layouts.app')
@section('title', 'Edit Pasien')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{route('patients.update', $patient->id)}}" method="post" novalidate>
                    <div class="card-header">Edit Pasien</div>
                    <div class="card-body">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-md-3 my-1"> <label>ID Pasien</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="code" class="form-control @error('code') border-danger @enderror" value="{{ $patient->code ?? old('code') }}">
                                @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Nama Pasien</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="name" class="form-control @error('name') border-danger @enderror" value="{{ $patient->name ?? old('name') }}">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Alamat Pasien</label> </div>
                            <div class="col-md-9 my-1">
                                <textarea type="text" rows="3" name="address" class="form-control @error('address') border-danger @enderror">{{ $patient->address ?? old('address') }}</textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>JK Pasien</label> </div>
                            <div class="col-md-9 my-1">
                                <select name="gender" class="form-control @error('gender') border-danger @enderror">
                                    <option value="" {{ $patient->gender ? '' : 'selected' }} disabled>Pilih Jenis Kelamin</option>
                                    <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Penyakit</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="sick" class="form-control @error('sick') border-danger @enderror" value="{{ $patient->sick ?? old('sick') }}">
                                @error('sick') <span class="text-danger">{{ $message }}</span> @enderror
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
