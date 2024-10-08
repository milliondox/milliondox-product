<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreFixedAsset extends Model
{
    use HasFactory;
    protected $table = 'store_fixed_asset';
    protected $fillable = [
        
        
        'file_type',
        'file_name',
        'real_file_name',
        'file_path',
        'file_size',
        'user_name',
        'user_id',
        'asset_name',
        'asset_id',
        'loc',
        'description',
        'asset_category',
        'division',
        'date_of_purchase',
        'date_put_to_use',
        'asset_life',
        'asset_make',
        'purchase_price',
        'amc_contract',
        'insurance_contract',
        'inovice_file_type',
        'inovice_file_name',
        'inovice_real_file_name',
        'inovice_file_path',
        'inovice_file_size',
        'invoice_date',
        'invoice_no'
        
        
    ];

   
}