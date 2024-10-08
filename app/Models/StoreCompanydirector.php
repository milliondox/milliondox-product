<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCompanydirector extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'store_company_director'; // Default table name is plural ('store_gsts') but this specifies a custom name

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'name',
        'startdate',
        'enddate',
        'DIN',
        'path',
        'parent_name',
        'is_delete',
       
    ];

    /**
     * Define the relationship with the User model
     * Assuming there's a users table with which this model relates
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
