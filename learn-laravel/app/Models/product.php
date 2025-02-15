<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    // use HasFactory;

    // Table Name
    protected $table = 'products';

    // Primary Key
    protected $primaryKey = 'product_id';

    // Fillable fields
    protected $fillable = [
        'product_name',
        'product_price',
        'product_quantity',
        'user_id',
    ];

    // Timestamps
    public $timestamps = true;

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

