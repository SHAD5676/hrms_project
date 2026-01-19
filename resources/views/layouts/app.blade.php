<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HRMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen d-flex">

        <!-- Sidebar -->
        <aside class="bg-dark text-white vh-100 p-3" style="width: 250px;">
            <h3 class="text-center mb-4">Admin Panel</h3>
            <ul class="nav flex-column">
                <li class="nav-item mb-1"><a class="nav-link text-white" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
                <li class="nav-item mb-1"><a class="nav-link text-white" href="{{ route('departments.index') }}"><i class="fas fa-building me-2"></i> Departments</a></li>
                <li class="nav-item mb-1"><a class="nav-link text-white" href="{{ route('designations.index') }}"><i class="fas fa-id-badge me-2"></i> Designations</a></li>
                <li class="nav-item mb-1"><a class="nav-link text-white" href="{{ route('employees.index') }}"><i class="fas fa-users me-2"></i> Employees</a></li>
                <li class="nav-item mb-1"><a class="nav-link text-white" href="{{ route('attendances.index') }}"><i class="fas fa-clock me-2"></i> Attendance</a></li>
                <li class="nav-item mb-1"><a class="nav-link text-white" href="{{ route('leaves.index') }}"><i class="fas fa-calendar-times me-2"></i> Leaves</a></li>
                <li class="nav-item mb-1"><a class="nav-link text-white" href="{{ route('payrolls.index') }}"><i class="fas fa-money-bill-wave me-2"></i> Payroll</a></li>
            </ul>
        </aside>

        <!-- Page Content Wrapper -->
        <div class="flex-grow-1">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">HRMS</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="m-2">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm w-100">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="p-4">
                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>
