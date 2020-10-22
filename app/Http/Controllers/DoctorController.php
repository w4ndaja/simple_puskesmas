<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::paginate(10);
        return view('pages.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor = new Doctor;
        return view('pages.doctor.create', compact('doctor'));
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
        Doctor::create($this->getForm());
        return redirect(route('doctors.index'))->with('success', 'Dokter Berhasil ditambah');
    }

    public function getForm()
    {
        return request()->only('code', 'name', 'specialist', 'address');
    }

    public function validateForm($update = null)
    {
        request()->validate([
            'code' => 'required|unique:doctors,code' . ($update ? "," . $update->id : ''),
            'name' => 'required',
            'specialist' => 'required',
            'address' => 'required',
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
    public function edit(Doctor $doctor)
    {
        return view('pages.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request()
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Doctor $doctor)
    {
        $this->validateForm($doctor);
        $doctor->update($this->getForm());
        return redirect(route('doctors.index'))->with('success', 'Dokter Berhasil diperbaharui');
    }

    public function confirmDelete(Doctor $doctor)
    {
        return view('partials.confirm-delete', ['data' => $doctor, 'type' => 'doctors', 'name' => $doctor->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect(route('doctors.index'))->with('success', "Dokter dengan ID " . $doctor->code . " Berhasil dihapus...!");
    }
}
