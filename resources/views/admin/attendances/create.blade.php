@extends('adminlte::page')

@section('title', 'Mark Attendance')

@section('content_header')
    <h1>Mark Attendance</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form method="POST" action="{{ route('attendances.store') }}">
            @csrf

            {{-- Employee --}}
            <div class="form-group">
                <label>Employee</label>
                <select name="employee_id" class="form-control" required>
                    <option value="">-- Select Employee --</option>
                    @foreach($employees as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Date --}}
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            {{-- Check In --}}
            <div class="form-group">
                <label>Check In</label>
                <input type="time" name="check_in" class="form-control">
            </div>

            {{-- Check Out --}}
            <div class="form-group">
                <label>Check Out</label>
                <input type="time" name="check_out" class="form-control">
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="present">Present</option>
                    <option value="late">Late</option>
                    <option value="absent">Absent</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Save Attendance
            </button>

            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">
                Back
            </a>
        </form>

    </div>
</div>

@stop
