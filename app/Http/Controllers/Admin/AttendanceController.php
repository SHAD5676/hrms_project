<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->get();
        return view('admin.attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('admin.attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'date' => 'required|date',
        ]);

        Attendance::updateOrCreate(
            [
                'employee_id' => $request->employee_id,
                'date' => $request->date,
            ],
            [
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'status' => $request->status,
            ]
        );

        return redirect()->route('attendances.index')
            ->with('success','Attendance saved');
    }
}