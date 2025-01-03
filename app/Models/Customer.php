<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customertb';
    protected $fillable = [
        'profile_picture',
        'lename',
        'dname',
        'dmail',
        'dphone',
        'roa',
        'state',
        'city',
        'pincode',
        'CinNo',
        'cin_file',
        'GSTINNo',
        'gstin_file',
        'type_of_entity',
        'customer_created_by',
        'brandname',
        'phone',
        'email',
        
    ];
    protected $casts = [
        'dname' => 'array',
        'dmail' => 'array',
        'dphone' => 'array',
    ];
    public function customerContracts()
{
    return $this->hasMany(CustomerContract::class, 'customer_id');
}
}
