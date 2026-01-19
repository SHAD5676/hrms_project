@extends('adminlte::page')

@section('title', 'Edit Department')

@section('content_header')
    <h1>Edit Department</h1>
@endsection

@section('content')
<form action="{{ route('departments.update',$department->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Department Name</label>
        <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
    </div>
    <button type="submit" class="btn btn-success mt-2">Update</button>
</form>
@endsection
