<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class  CreditCardStatementsAddCreditCardState extends Model
{
    use HasFactory;
    protected $table = 'CreditCardStatements_Add_Credit_Card_State';
    protected $fillable = [
        
        'file_status',
        'file_type',
        'file_name',
        'real_file_name',
        'file_path',
        'file_size',
        'user_name',
        'user_id',
        'activities',
        'reason_for_change',
        'update_dates',
        'fyear',
        'Month',
        'Tags',
        'bank_name',
        'is_delete'
    ];

   
}
