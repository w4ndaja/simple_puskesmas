<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use PhpParser\Comment\Doc;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_services = Service::all();
        $services = Service::with('doctor:id,code,name', 'patient:id,code,name')->paginate(10);
        $service_count = $all_services->count();
        $service_sum_price = $all_services->sum('price');
        $patient_count = Patient::all()->count();
        $doctor_count = Doctor::all()->count();
        return view('pages.service.index', compact('services', 'patient_count', 'doctor_count', 'service_count', 'service_sum_price'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new Service;
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('pages.service.create', compact('service', 'doctors', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  request()
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validateForm();
        Service::create($this->getForm());
        return redirect(route('services.index'))->with('success', 'Pelayanan Berhasil ditambah');
    }

    public function getForm()
    {
        return request()->only(
            'checkin_date',
            'checkout_date',
            'patient_id',
            'doctor_id',
            'price',
            'sick',
        );
    }

    public function validateForm($update = null)
    {
        request()->validate([
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'price' => 'required',
            'sick' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('pages.service.edit', compact('service', 'patients', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request()
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service)
    {
        $this->validateForm($service);
        $service->update($this->getForm());
        return redirect(route('services.index'))->with('success', 'Pelayanan Berhasil diperbaharui');
    }

    public function confirmDelete(Service $service)
    {
        return view('partials.confirm-delete', ['data' => $service, 'type' => 'services', 'name' => $service->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect(route('services.index'))->with('success', "Pelayanan dengan ID " . $service->code . " Berhasil dihapus...!");
    }
}
