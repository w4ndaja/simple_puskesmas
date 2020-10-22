@extends('layouts.app')
@section('title', 'Tambah Pelayanan')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{route('services.store')}}" method="post" novalidate>
                    <div class="card-header">Tambah Pelayanan</div>
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 my-1"> <label>Tanggal Masuk</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="date" name="checkin_date" class="form-control @error('checkin_date') border-danger @enderror" value="{{ $service->checkin_date ?? old('checkin_date') }}">
                                @error('checkin_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Tanggal Keluar</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="date" name="checkout_date" class="form-control @error('checkout_date') border-danger @enderror" value="{{ $service->checkout_date ?? old('checkout_date') }}">
                                @error('checkout_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Pasien</label> </div>
                            <div class="col-md-9 my-1">
                                <select name="patient_id" class="form-control @error('patient_id') border-danger @enderror">
                                    <option value="" disabled {{$service->patient ? '' : 'selected'}} >Pilih Pasien</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}" {{$service->patient && $service->patient->id == $patient->id ? 'checked' : ''}} >{{ $patient->code }} - {{$patient->name}}</option>
                                    @endforeach
                                </select>
                                @error('patient_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Dokter</label> </div>
                            <div class="col-md-9 my-1">
                                <select name="doctor_id" class="form-control @error('doctor_id') border-danger @enderror">
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{$service->doctor && $service->doctor->id == $doctor->id ? 'checked' : ''}}>{{ $doctor->code }} - {{$doctor->name}}</option>
                                    @endforeach
                                </select>
                                @error('doctor_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-3 my-1"> <label>Biaya</label> </div>
                            <div class="col-md-9 my-1">
                                <input type="number" name="price" class="form-control @error('price') border-danger @enderror">
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
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
