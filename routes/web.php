<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\PayrollController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post', [PostController::class, 'store']);


    Route::resource('departments', DepartmentController::class);
    Route::resource('designations', DesignationController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('leaves', LeaveController::class);
    Route::resource('payrolls', PayrollController::class);


    Route::resource('leaves', LeaveController::class)->except(['update']);
    Route::patch('/leaves/{leave}/status', [LeaveController::class, 'updateStatus'])
        ->name('leaves.updateStatus');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    })->name('logout');
});


require __DIR__ . '/auth.php';
