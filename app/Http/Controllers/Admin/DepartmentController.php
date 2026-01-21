<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

   

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate(
        [
            'name' => 'required|min:3|max:12',
        ],
        [
            'name.required' => 'Department name is required',
            'name.min' => 'Minimum 3 characters required',
            'name.max' => 'Maximum 12 characters allowed',
        ]
    );

    Department::create([
        'name' => $request->name,
    ]);

    return redirect()->route('departments.index')
        ->with('success', 'Department created successfully');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|min:3|max:12',
        ], [
            'name.required' => 'Department name is required',
            'name.min' => 'Minimum 3 characters required',
            'name.max' => 'Maximum 12 characters allowed',
        ]);

        $department->update($request->only('name'));

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
