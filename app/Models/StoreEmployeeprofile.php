<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreEmployeeprofile extends Model
{
    use HasFactory;
    protected $table = 'store_employee_profile';
    protected $fillable = [
        
       
        'file_type',
        
        'real_file_name',
        'file_path',
        'file_size',
        'fname',
        'position',
        'division',
        'startdate',
        'startend',
        'user_id'
       
    ];

   
}
