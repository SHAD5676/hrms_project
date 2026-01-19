@extends('adminlte::page')

@section('content_header')
<h1>Edit Employee</h1>
@endsection

@section('content')
<form action="{{ route('employees.update',$employee->id) }}" method="POST">
@csrf @method('PUT')
<input type="text" name="name" value="{{ $employee->name }}" class="form-control mb-2" required>
<input type="email" name="email" value="{{ $employee->email }}" class="form-control mb-2" required>
<input type="text" name="phone" value="{{ $employee->phone }}" class="form-control mb-2">

<select name="department_id" class="form-control mb-2" required>
@foreach($departments as $d)
<option value="{{ $d->id }}" @selected($d->id==$employee->department_id)>{{ $d->name }}</option>
@endforeach
</select>

<select name="designation_id" class="form-control mb-2" required>
@foreach($designations as $d)
<option value="{{ $d->id }}" @selected($d->id==$employee->designation_id)>{{ $d->name }}</option>
@endforeach
</select>

<input type="date" name="joining_date" value="{{ $employee->joining_date }}" class="form-control mb-2">

<select name="status" class="form-control mb-2">
<option value="1" @selected($employee->status==1)>Active</option>
<option value="0" @selected($employee->status==0)>Inactive</option>
</select>

<button class="btn btn-success">Update</button>
</form>
@endsection
