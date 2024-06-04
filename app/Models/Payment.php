<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_date',
        'amount',
        'payment_method',
        'status',
        'transaction_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
