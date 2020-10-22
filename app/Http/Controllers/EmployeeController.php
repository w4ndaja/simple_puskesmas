<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('pages.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee;
        return view('pages.employee.create', compact('employee'));
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
        Employee::create($this->getForm());
        return redirect(route('employees.index'))->with('success', 'Pegawai Berhasil ditambah');
    }

    public function getForm()
    {
        $form = [ 'code', 'name', 'username', ];
        $return = request()->only($form);
        if(request()->password) $return['password'] = bcrypt(request()->password);
        return $return;
    }

    public function validateForm($update = null)
    {
        $form = [
            'code' => 'required|unique:employees,code' . ($update ? "," . $update->id : ''),
            'name' => 'required',
            'username' => 'required|unique:employees,username' . ($update ? "," . $update->id : ''),
        ];
        !$update ? $form['password'] = 'required' : true;
        request()->validate($form);
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
    public function edit(Employee $employee)
    {
        return view('pages.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request()
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee)
    {
        $this->validateForm($employee);
        $employee->update($this->getForm());
        return redirect(route('employees.index'))->with('success', 'Pegawai Berhasil diperbaharui');
    }

    public function confirmDelete(Employee $employee)
    {
        return view('partials.confirm-delete', ['data' => $employee, 'type' => 'employees', 'name' => $employee->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('employees.index'))->with('success', "Pegawai dengan ID " . $employee->code . " Berhasil dihapus...!");
    }
}
