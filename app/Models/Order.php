<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'ordered_at',
        'order_type',
        'price',
        'vwap',
    ];

    protected $casts = [
        'ordered_at' => 'datetime',
        'price' => 'integer',
        'vwap' => 'float',
    ];
}