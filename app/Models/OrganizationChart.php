<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationChart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'name',
        'description',
        // Add other fields here as needed
    ];

    // Define any relationships or additional methods here
}
