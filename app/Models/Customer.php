<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id'; // Thay 'customer_id' bằng tên của cột khóa chính trong bảng customers
    protected $fillable = ['customer_name', 'customer_email', 'customer_phone'];
}

