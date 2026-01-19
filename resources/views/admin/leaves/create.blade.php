@extends('adminlte::page')

@section('title','Apply Leave')

@section('content')
<h1>Apply Leave</h1>

<form method="POST" action="{{ route('leaves.store') }}">
@csrf

<select name="employee_id" class="form-control mb-2">
@foreach($employees as $emp)
<option value="{{ $emp->id }}">{{ $emp->name }}</option>
@endforeach
</select>

<select name="type" class="form-control mb-2">
<option value="casual">Casual</option>
<option value="sick">Sick</option>
<option value="annual">Annual</option>
</select>

<input type="date" name="from_date" class="form-control mb-2">
<input type="date" name="to_date" class="form-control mb-2">

<textarea name="reason" class="form-control mb-2" placeholder="Reason"></textarea>

<button class="btn btn-success">Submit</button>
</form>
@stop
