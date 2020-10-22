@extends('layouts.app')
@section('title', 'Dokter')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success" id="message">
                {{session('success')}}
                <script>
                    setTimeout(() => { document.getElementById('message').remove() }, 2000);
                </script>
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Dokter</h4>
                    <a href="{{route('doctors.create')}}" class="btn btn-success">Tambah Dokter</a>
                </div>
                <div class="card-body">
                    @if (sizeof($doctors) < 1) <div class="w-100 d-flex justify-content-center align-items-center">
                        <div class="alert alert-info">Data Kosong</div>
                </div>
                @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID PASIEN</th>
                            <th>NAMA PASIEN</th>
                            <th>SPESIALIS PASIEN</th>
                            <th>ALAMAT</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->code }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->specialist }}</td>
                            <td>{{ $doctor->address }}</td>
                            <td>
                                <a href="{{route('doctors.edit', $doctor->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('doctors.confirm-delete', $doctor->id)}}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>
            @if(sizeof($doctors) > 0) <div class="card-footer d-flex justify-content-end">
                {{ $doctors->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
