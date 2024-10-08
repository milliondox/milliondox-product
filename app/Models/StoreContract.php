<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreContract extends Model
{
    use HasFactory;
    protected $table = 'store_contract';
    protected $fillable = [
        
        
        'file_type',
        
        'real_file_name',
        'file_path',
        'file_size',
        'user_name',
        'contract_name',
        'contracttype',

        'contract_type',
        'divison',
        'vendor_name',
        'legal_entity_status',

        'startdate',
        'startend',
        'contract_value',
        'signing_status',
        'renewal_terms',
        'payment_terms',
        'user_id',
        'fee_escalation_clause'
        
    ];

   
}
