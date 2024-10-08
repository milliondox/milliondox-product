<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateFile extends Model
{
    use HasFactory;

    protected $table = 'template_files'; // The name of the table in the database

    protected $fillable = ['filename', 'file_contents', 'file_path', 'file_name','template_type','favorite'];

   
}
