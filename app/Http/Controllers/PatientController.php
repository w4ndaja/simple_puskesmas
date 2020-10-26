<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('pages.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = new Patient;
        return view('pages.patient.create', compact('patient'));
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
        Patient::create($this->getForm());
        return redirect(route('patients.index'))->with('success', 'Pasien Berhasil ditambah');
    }

    public function getForm()
    {
        return request()->only('code', 'name', 'address', 'gender');
    }

    public function validateForm($update = null)
    {
        request()->validate([
            'code' => 'required|unique:patients,code' . ($update ? "," . $update->id : ''),
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
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
    public function edit(Patient $patient)
    {
        return view('pages.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request()
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Patient $patient)
    {
        $this->validateForm($patient);
        $patient->update($this->getForm());
        return redirect(route('patients.index'))->with('success', 'Pasien Berhasil diperbaharui');
    }

    public function confirmDelete(Patient $patient)
    {
        return view('partials.confirm-delete', ['data' => $patient, 'type' => 'patients', 'name' => $patient->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect(route('patients.index'))->with('success', "Pasien dengan ID " . $patient->code . " Berhasil dihapus...!");
    }
}
