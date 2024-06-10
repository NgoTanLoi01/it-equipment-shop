<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'sale_price', 'sale_percentage', 'feature_image_path', 'feature_image_name', 'content', 'user_id', 'slug', 'category_id', 'view_count', 'quantity', 'created_at', 'updated_at', 'delete_at'
    ];

    protected $guarded = [];
    public function getDiscountPercentageAttribute()
    {
        if ($this->price > 0 && $this->sale_price < $this->price) {
            return round((($this->price - $this->sale_price) / $this->price) * 100, 2);
        }
        return 0;
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tags',
            'product_id',
            'tag_id'
        )->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function productImage()
    {
        return $this->hasMany(ProductImage::class,  'product_id');
    }

    protected $table = 'products';
    // Trong tệp Product.php (hoặc tên tương ứng của model)
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
            ->withPivot('quantity', 'price'); // Thêm thông tin chi tiết về quantity và price nếu có
    }
}
