@extends('layouts.app')
@section('title', 'Tambah Dokter')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{route('doctors.store')}}" method="post" novalidate>
                    <div class="card-header">Tambah Dokter</div>
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 my-1"> <label>ID Dokter</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="code" class="form-control @error('code') border-danger @enderror" value="{{ $patient->code ?? old('code') }}">
                                @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Nama Dokter</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="name" class="form-control @error('name') border-danger @enderror" value="{{ $patient->name ?? old('name') }}">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Spesialis Dokter</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="text" name="specialist" class="form-control @error('specialist') border-danger @enderror" value="{{ $patient->specialist ?? old('specialist') }}">
                                @error('specialist') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Alamat Dokter</label> </div>
                            <div class="col-md-9 my-1">
                                <textarea type="text" rows="3" name="address" class="form-control @error('address') border-danger @enderror" value="{{ $patient->address ?? old('address') }}"></textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
