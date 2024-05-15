<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'customer_id',
        'shipping_id',
        'payment_id',
        'user_id',
        'order_total',
        'order_status',
        'delivery_status',
        // Các cột khác...
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
