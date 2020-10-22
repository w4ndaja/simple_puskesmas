@extends('layouts.app')
@section('title', 'Pelayanan')
@section('content')
<div class="container">
    <div class="row">
        @if(session('success'))
        <div class="alert alert-success" id="message">
            {{session('success')}}
            <script>
                setTimeout(() => { document.getElementById('message').remove() }, 2000);
            </script>
        </div>
        @endif
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-success">
                    Total Pelayanan
                </div>
                <div class="card-body">
                    <strong class="text-info">{{ $services->count() }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-success">
                    Total Pasien
                </div>
                <div class="card-body">
                    <strong class="text-info">{{ $patient_count }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-success">
                    Total Dokter
                </div>
                <div class="card-body">
                    <strong class="text-info">{{ $doctor_count }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Pelayanan</h4>
                    <a href="{{route('services.create')}}" class="btn btn-success">Tambah Pelayanan</a>
                </div>
                <div class="card-body">
                    @if (sizeof($services) < 1) <div class="w-100 d-flex justify-content-center align-items-center">
                        <div class="alert alert-info">Data Kosong</div>
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Pasien</th>
                                <th>Dokter</th>
                                <th>Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->checkin_date->format('d M Y') }}</td>
                                <td>{{ $service->checkout_date->format('d M Y') }}</td>
                                <td>{{ $service->patient->code }} - {{$service->patient->name}}</td>
                                <td>{{ $service->doctor->code }} - {{$service->doctor->name}}</td>
                                <td><span class="text-nowrap rounded bg-info p-1 my-auto">Rp. {{ $service->price }}</span></td>
                                <td class="d-flex flex-row">
                                    <a href="{{route('services.edit', $service->id)}}" class="btn btn-info mx-1">Edit</a>
                                    <a href="{{route('services.confirm-delete', $service->id)}}" class="btn btn-danger mx-1">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
            @if(sizeof($services) > 0) <div class="card-footer d-flex justify-content-end">
                {{ $services->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
