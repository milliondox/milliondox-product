<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'divisions';

    // Define the fields that are mass assignable
    protected $fillable = [
        'user_id',
        'division_name',
    ];

    // Optionally, if you don't want the created_at and updated_at timestamps
    // you can disable them with the following:
    // public $timestamps = false;
}
