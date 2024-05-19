<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
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
    
}
