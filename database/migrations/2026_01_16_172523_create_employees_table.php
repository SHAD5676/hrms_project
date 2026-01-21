<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->Id('department_id');
        $table->Id('designation_id');
        $table->date('joining_date')->nullable();
        $table->boolean('status')->default(1); 
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
