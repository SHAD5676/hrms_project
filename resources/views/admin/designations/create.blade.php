@extends('adminlte::page')

@section('content_header')
<h1>Add Designation</h1>
@endsection

@section('content')
<form method="POST" action="{{ route('designations.store') }}">
@csrf

<select name="department_id" class="form-control mb-2">
@foreach($departments as $dept)
<option value="{{ $dept->id }}">{{ $dept->name }}</option>
@endforeach
</select>

<input type="text" name="name" class="form-control mb-2" placeholder="Designation name">

<button class="btn btn-success">Save</button>
</form>
@endsection
