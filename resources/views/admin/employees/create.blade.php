@extends('adminlte::page')

@section('content_header')
<h1>Add Employee</h1>
@endsection

@section('content')
<form action="{{ route('employees.store') }}" method="POST">
@csrf
<input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
<input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
<input type="text" name="phone" placeholder="Phone" class="form-control mb-2">

<select name="department_id" class="form-control mb-2" required>
@foreach($departments as $d)
<option value="{{ $d->id }}">{{ $d->name }}</option>
@endforeach
</select>

<select name="designation_id" class="form-control mb-2" required>
@foreach($designations as $d)
<option value="{{ $d->id }}">{{ $d->name }}</option>
@endforeach
</select>

<input type="date" name="joining_date" class="form-control mb-2">

<select name="status" class="form-control mb-2">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>

<button class="btn btn-success">Save</button>
</form>
@endsection
