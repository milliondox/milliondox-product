<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['file_name', 'path','parent_folder','user_id','fyear','Month','file_size'];
}