@extends('adminlte::page')

@section('content_header')
<h1>Designations</h1>
<a href="{{ route('designations.create') }}" class="btn btn-primary">Add Designation</a>
@endsection

@section('content')
<table class="table table-bordered">
<tr>
    <th>Department</th>
    <th>Name</th>
    <th>Action</th>
</tr>
@foreach($designations as $d)
<tr>
    <td>{{ $d->department->name }}</td>
    <td>{{ $d->name }}</td>
    <td>
        <a href="{{ route('designations.edit',$d->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('designations.destroy',$d->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
