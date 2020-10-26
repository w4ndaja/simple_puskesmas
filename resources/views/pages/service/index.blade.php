@extends('layouts.app')
@section('title', 'Pelayanan')
@section('content')
<div class="container py-3">
    <div class="row">
        @if(session('success'))
        <div class="col-md-12">
            <div class="alert alert-success" id="message">
                {{session('success')}}
                <script>
                    setTimeout(() => { document.getElementById('message').remove() }, 2000);
                </script>
            </div>
        </div>
        @endif
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-success">
                    Total Pelayanan
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="text-white p-2 rounded-circle bg-info d-flex justify-content-center align-items-center" style="height:32px;width:32px">{{ $service_count }}</div>
                    <strong class="text-info">Rp. {{ number_format($service_sum_price, 2, ',', '.') }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-header bg-success">
                    Total Pasien
                </div>
                <div class="card-body">
                    <div class="text-white bg-success rounded-circle p-2 d-flex justify-content-center align-items-center" style="width:32px;height:32px">{{ $patient_count }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-header bg-success">
                    Total Dokter
                </div>
                <div class="card-body">
                    <div class="text-white bg-warning d-flex justify-content-center align-items-center rounded-circle" style="height:32px;width:32px">{{ $doctor_count }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Pelayanan</h4>
                    <a href="{{route('services.create')}}" class="ml-2 btn btn-success">Tambah Pelayanan</a>
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
                                <th>PENYAKIT</th>
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
                                <td><span class="text-nowrap rounded bg-info p-1 my-auto">Rp. {{ number_format($service->price, 2, ',', '.') }}</span></td>
                                <td>{{ $service->sick }}</td>
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
