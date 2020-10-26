@extends('layouts.app')
@section('title', 'Konfirmasi Hapus')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-center align-items center">
        <div class="card">
            <form action="{{ route($type.".destroy", $data->id) }}" method="post">
                @csrf
                @method('delete')
                <div class="card-header bg-danger text-white">Peringatan...!</div>
                <div class="card-body py-5">
                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data {{ $name }} ? </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-info">Kembali</a>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
