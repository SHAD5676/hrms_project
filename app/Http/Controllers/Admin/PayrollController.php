<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;


class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('employee')->latest()->get();
        return view('admin.payrolls.index', compact('payrolls'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('admin.payrolls.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'  => 'required|exists:employees,id',
            'basic_salary' => 'required|numeric|min:0',
            'allowances'   => 'nullable|numeric|min:0',
            'deductions'   => 'nullable|numeric|min:0',
            'month'        => 'required|string',
        ]);

        $net_salary = $request->basic_salary + ($request->allowances ?? 0) - ($request->deductions ?? 0);

        Payroll::create([
            'employee_id'  => $request->employee_id,
            'basic_salary' => $request->basic_salary,
            'allowances'   => $request->allowances ?? 0,
            'deductions'   => $request->deductions ?? 0,
            'net_salary'   => $net_salary,
            'month'        => $request->month,
        ]);

        return redirect()->route('payrolls.index')
            ->with('success', 'Payroll generated successfully');
    }

    public function edit(Payroll $payroll)
    {
        $employees = Employee::all();
        return view('admin.payrolls.edit', compact('payroll', 'employees'));
    }

    public function update(Request $request, Payroll $payroll)
    {
        $request->validate([
            'employee_id'  => 'required|exists:employees,id',
            'basic_salary' => 'required|numeric|min:0',
            'allowances'   => 'nullable|numeric|min:0',
            'deductions'   => 'nullable|numeric|min:0',
            'month'        => 'required|string',
        ]);

        $net_salary = $request->basic_salary + ($request->allowances ?? 0) - ($request->deductions ?? 0);

        $payroll->update([
            'employee_id'  => $request->employee_id,
            'basic_salary' => $request->basic_salary,
            'allowances'   => $request->allowances ?? 0,
            'deductions'   => $request->deductions ?? 0,
            'net_salary'   => $net_salary,
            'month'        => $request->month,
        ]);

        return redirect()->route('payrolls.index')
            ->with('success', 'Payroll updated successfully');
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return redirect()->route('payrolls.index')
            ->with('success', 'Payroll deleted successfully');
    }
}