@extends('adminlte::page')

@section('content_header')
<h1>Edit Designation</h1>
@endsection

@section('content')
<form method="POST" action="{{ route('designations.update',$designation->id) }}">
@csrf @method('PUT')

<select name="department_id" class="form-control mb-2">
@foreach($departments as $dept)
<option value="{{ $dept->id }}" @selected($dept->id==$designation->department_id)>
{{ $dept->name }}
</option>
@endforeach
</select>

<input type="text" name="name" value="{{ $designation->name }}" class="form-control mb-2">

<button class="btn btn-success">Update</button>
</form>
@endsection
