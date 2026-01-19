@extends('adminlte::page')

@section('title', 'Add Department')

@section('content_header')
    <h1>Add Department</h1>
@endsection

@section('content')
<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Department Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success mt-2">Save</button>
</form>
@endsection
