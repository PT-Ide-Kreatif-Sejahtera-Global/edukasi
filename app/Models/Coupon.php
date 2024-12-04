<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['coupon_code', 'discount_type', 'discount_value', 'valid_from', 'valid_until', 'usage_limit', 'total_usage'];
}
