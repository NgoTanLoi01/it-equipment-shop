<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_name', 'customer_email', 'customer_phone', 'google_id', 'password'];
    public function getAuthIdentifierName()
    {
        return 'customer_id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
