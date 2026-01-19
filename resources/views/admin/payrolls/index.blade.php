@extends('adminlte::page')

@section('title','Payrolls')

@section('content')
<h1>Payrolls</h1>

<a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-2">Generate Payroll</a>

<table class="table table-bordered table-striped">
<tr>
<th>#</th>
<th>Employee</th>
<th>Basic Salary</th>
<th>Allowances</th>
<th>Deductions</th>
<th>Net Salary</th>
<th>Month</th>
<th>Action</th>
</tr>

@foreach($payrolls as $payroll)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $payroll->employee->name }}</td>
<td>{{ $payroll->basic_salary }}</td>
<td>{{ $payroll->allowances }}</td>
<td>{{ $payroll->deductions }}</td>
<td>{{ $payroll->net_salary }}</td>
<td>{{ $payroll->month }}</td>
<td>
<a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@stop
