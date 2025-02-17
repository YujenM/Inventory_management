<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';  // Table name
    protected $primaryKey = 'sales_id'; // Primary key

    protected $fillable = [
        'quantity', 'unit_cost', 'total_amount', 'product_id', 'user_id'
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'product_id');
    }
}
