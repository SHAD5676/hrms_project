<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'department_id', 'designation_id', 'joining_date', 'status'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function attendances()
{
    return $this->hasMany(Attendance::class);
}

public function leaves()
{
    return $this->hasMany(Leave::class);
}

}
