<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Specify table name
    protected $primaryKey = 'product_id'; // Define the primary key

    public $incrementing = true; // Set to false if it's not auto-incrementing
    protected $keyType = 'int'; // Ensures Laravel treats it as an integer

    protected $fillable = [
        'product_name',
        'product_price',
        'product_quantity',
        'user_id',
    ];

    public $timestamps = true; // Enable timestamps

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
