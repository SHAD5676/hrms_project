@extends('adminlte::page')

@section('content_header')
<h1>Employees</h1>
<a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
@endsection

@section('content')
<table class="table table-bordered">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Department</th>
    <th>Designation</th>
    <th>Action</th>
</tr>
@foreach($employees as $emp)
<tr>
    <td>{{ $emp->name }}</td>
    <td>{{ $emp->email }}</td>
    <td>{{ $emp->phone }}</td>
    <td>{{ $emp->department->name }}</td>
    <td>{{ $emp->designation->name }}</td>
    <td>
        <a href="{{ route('employees.edit',$emp->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('employees.destroy',$emp->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
