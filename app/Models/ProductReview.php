<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'customer_id',
        'reviewer_name',
        'reviewer_phone',
        'rating',
        'review_title',
        'review_text'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
