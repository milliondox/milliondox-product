<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderPath extends Model
{
    use HasFactory;
 protected $table = 'folder_paths';
    protected $fillable = ['user_id', 'folder_path'];
}
