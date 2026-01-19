@extends('adminlte::page')

@section('title', 'Attendance List')

@section('content_header')
    <h1>Attendance</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <a href="{{ route('attendances.create') }}" class="btn btn-primary">
            + Mark Attendance
        </a>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->employee->name ?? '-' }}</td>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->check_in ?? '-' }}</td>
                        <td>{{ $attendance->check_out ?? '-' }}</td>
                        <td>
                            <span class="badge 
                                @if($attendance->status=='present') bg-success
                                @elseif($attendance->status=='late') bg-warning
                                @else bg-danger
                                @endif">
                                {{ ucfirst($attendance->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No attendance found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@stop
