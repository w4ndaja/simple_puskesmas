@extends('layouts.app')
@section('title', 'Pasien')
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
                    <h4>Pasien</h4>
                    <a href="{{route('patients.create')}}" class="btn btn-success">Tambah Pasien</a>
                </div>
                <div class="card-body">
                    @if (sizeof($patients) < 1) <div class="w-100 d-flex justify-content-center align-items-center">
                        <div class="alert alert-info">Data Kosong</div>
                </div>
                @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID PASIEN</th>
                            <th>NAMA PASIEN</th>
                            <th>ALAMAT PASIEN</th>
                            <th>JK</th>
                            <th>PENYAKIT</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->code }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ $patient->gender == 'male' ? 'Laki laki' : 'Perempuan' }}</td>
                            <td>{{ $patient->sick }}</td>
                            <td>
                                <a href="{{route('patients.edit', $patient->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('patients.confirm-delete', $patient->id)}}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>
            @if(sizeof($patients) > 0) <div class="card-footer d-flex justify-content-end">
                {{ $patients->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
