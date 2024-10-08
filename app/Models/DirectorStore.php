<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorStore extends Model
{
    use HasFactory;
    protected $table = 'director_store'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'dname',
        'drfile',
       
        'status',
        'expiredate',
        'activedate',
        'location',
        'aadharcard_filepath',
        'pancard_filepath',
        'voterid_filepath',
        'passpost_filepath',
        
        
    ];
}
