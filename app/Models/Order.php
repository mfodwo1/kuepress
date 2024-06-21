<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reference',
        'address_id',
        'order_date',
        'status',
        'total_price',
        'transaction_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function useraddress()
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
