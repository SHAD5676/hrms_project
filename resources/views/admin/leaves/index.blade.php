@extends('adminlte::page')

@section('title', 'Leaves')

@section('content_header')
    <h1>Leave Requests</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <a href="{{ route('leaves.create') }}" class="btn btn-primary">
            Apply Leave
        </a>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse($leaves as $leave)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $leave->employee->name }}</td>
                    <td>{{ ucfirst($leave->type) }}</td>
                    <td>{{ $leave->from_date }}</td>
                    <td>{{ $leave->to_date }}</td>

                    <td>
                        @if($leave->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($leave->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>

                    <td>
                        @if($leave->status == 'pending')
                            <form action="{{ route('leaves.updateStatus', $leave->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button class="btn btn-sm btn-success">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('leaves.updateStatus', $leave->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button class="btn btn-sm btn-danger">
                                    Reject
                                </button>
                            </form>
                        @else
                            —
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        No leave requests found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@stop
