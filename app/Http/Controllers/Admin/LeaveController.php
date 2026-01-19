<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('employee')->latest()->get();
        return view('admin.leaves.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('admin.leaves.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type'        => 'required|string',
            'from_date'   => 'required|date',
            'to_date'     => 'required|date|after_or_equal:from_date',
            'reason'      => 'nullable|string',
        ]);

        Leave::create([
            'employee_id' => $validated['employee_id'],
            'type'        => $validated['type'],
            'from_date'   => $validated['from_date'],
            'to_date'     => $validated['to_date'],
            'reason'      => $validated['reason'] ?? null,
            'status'      => 'pending', // default
        ]);

        return redirect()
            ->route('leaves.index')
            ->with('success', 'Leave applied successfully');
    }

    // approve / reject
    public function updateStatus(Request $request, Leave $leave)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $leave->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('leaves.index')
            ->with('success', 'Leave status updated');
    }
}
