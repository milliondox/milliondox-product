<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDirectorStore extends Model
{
    use HasFactory;
    protected $table = 'custom_director_store'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'custom_file',
        'director_id',
        'file_name'
        
        
    ];
}
