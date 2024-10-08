<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfiles extends Model
{
    use HasFactory;
    protected $table = 'company_profile'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'user_id',
        'state',
        'industry',
       
        'employee_count',
        'DOI',
        'CIN',
        'PAN',
        'Email',
        'Phone',
        'authorized_capital',
        'paid_up_capital',
       
        
        
        
    ];
}
