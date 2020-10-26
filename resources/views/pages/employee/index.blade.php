@extends('layouts.app')
@section('title', 'Pegawai')
@section('content')
<div class="container py-3">
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Pegawai</h4>
                    <a href="{{route('employees.create')}}" class="btn btn-success ml-2">Tambah Pegawai</a>
                </div>
                <div class="card-body">
                    @if (sizeof($employees) < 1) <div class="w-100 d-flex justify-content-center align-items-center">
                        <div class="alert alert-info">Data Kosong</div>
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID PEGAWAI</th>
                                <th>NAMA PEGAWAI</th>
                                <th>USERNAME</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->code }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->username }}</td>
                                <td>
                                    <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('employees.confirm-delete', $employee->id)}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
            @if(sizeof($employees) > 0) <div class="card-footer d-flex justify-content-end">
                {{ $employees->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
