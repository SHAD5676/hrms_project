<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department','designation'])->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('admin.employees.create', compact('departments','designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:employees,email',
            'department_id'=>'required',
            'designation_id'=>'required',
        ]);

        Employee::create($request->only('name','email','phone','department_id','designation_id','joining_date','status'));
        return redirect()->route('employees.index')->with('success','Employee added');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('admin.employees.edit', compact('employee','departments','designations'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:employees,email,'.$employee->id,
            'department_id'=>'required',
            'designation_id'=>'required',
        ]);

        $employee->update($request->only('name','email','phone','department_id','designation_id','joining_date','status'));
        return redirect()->route('employees.index')->with('success','Employee updated');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee deleted');
    }
}
