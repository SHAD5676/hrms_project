@extends('adminlte::page')

@section('content')
<h1>Add Department</h1>

<form action="{{ route('departments.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Department Name</label>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               class="form-control @error('name') is-invalid @enderror">
        
        @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success mt-2">Save</button>
</form>
@endsection
