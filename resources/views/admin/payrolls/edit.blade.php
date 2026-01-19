@extends('adminlte::page')

@section('title','Edit Payroll')

@section('content')
<h1>Edit Payroll</h1>

<a href="{{ route('payrolls.index') }}" class="btn btn-secondary mb-2">Back to Payrolls</a>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group mb-2">
        <label for="employee_id">Employee</label>
        <select name="employee_id" id="employee_id" class="form-control" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" 
                    {{ $employee->id == $payroll->employee_id ? 'selected' : '' }}>
                    {{ $employee->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-2">
        <label for="basic_salary">Basic Salary</label>
        <input type="number" name="basic_salary" id="basic_salary" class="form-control" step="0.01"
               value="{{ $payroll->basic_salary }}" required>
    </div>

    <div class="form-group mb-2">
        <label for="allowances">Allowances</label>
        <input type="number" name="allowances" id="allowances" class="form-control" step="0.01"
               value="{{ $payroll->allowances }}">
    </div>

    <div class="form-group mb-2">
        <label for="deductions">Deductions</label>
        <input type="number" name="deductions" id="deductions" class="form-control" step="0.01"
               value="{{ $payroll->deductions }}">
    </div>

    <div class="form-group mb-2">
        <label for="month">Month</label>
        <input type="month" name="month" id="month" class="form-control" value="{{ $payroll->month }}" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Update Payroll</button>
</form>
@stop
