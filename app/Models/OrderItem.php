<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id',
        'design_id',
        'quantity',
        'price',
        'additional_instructions',
        'user_design'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function design()
    {
        return $this->belongsTo(Design::class);
    }

}
