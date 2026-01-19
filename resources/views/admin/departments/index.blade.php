@extends('adminlte::page')

@section('title', 'Departments')

@section('content_header')
    <h1>Departments</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Department</a>
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($departments as $dept)
    <tr>
        <td>{{ $dept->name }}</td>
        <td>{{ $dept->status ? 'Active' : 'Inactive' }}</td>
        <td>
            <a href="{{ route('departments.edit',$dept->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('departments.destroy',$dept->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
