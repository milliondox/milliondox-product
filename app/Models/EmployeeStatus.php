<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    use HasFactory;
    protected $table = 'employeestatus';
    protected $fillable = ['employee_id', 'is_all_read'];
}


 