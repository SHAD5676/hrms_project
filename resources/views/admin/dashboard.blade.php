@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>HRMS Dashboard</h1>
@endsection

@section('content')
    <div class="row">
        <!-- Total Employees -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Employee::count() }}</h3>
                    <p>Total Employees</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('employees.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Departments -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\Department::count() }}</h3>
                    <p>Total Departments</p>
                </div>
                <div class="icon">
                    <i class="fas fa-building"></i>
                </div>
                <a href="{{ route('departments.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Designations -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Models\Designation::count() }}</h3>
                    <p>Total Designations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-id-badge"></i>
                </div>
                <a href="{{ route('designations.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Pending Leaves -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ \App\Models\Leave::where('status', 'pending')->count() }}</h3>
                    <p>Pending Leaves</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-times"></i>
                </div>
                <a href="{{ route('leaves.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>



    
    <x-admin-layout>

    <div class="container mt-5">
        <div class="row">
            <h1>Welcome to Admin Dashboard</h1>
        </div>
    </div>

</x-admin-layout>








    <!-- Recent Employees Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Recent Employees</h3>
        </div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Employee::latest()->take(5)->get() as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->department->name ?? '-' }}</td>
                            <td>{{ $employee->designation->name ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $employee->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
