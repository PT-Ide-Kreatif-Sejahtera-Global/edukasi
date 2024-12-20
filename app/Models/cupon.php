<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cupon extends Model
{
    use HasFactory;
    protected $table = 'cupons';
    protected $fillable = [
        'coupon_code', 'description', 'discount_type', 'discount_value',
        'valid_form', 'valid_until', 'usage_limit', 'total_usage'
    ];
    protected $casts = [
        'valid_form' => 'date',
        'valid_until' => 'date',
    ];
}
