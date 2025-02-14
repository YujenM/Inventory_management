<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // Ensure it matches your DB table

    protected $primaryKey = 'User_ID'; // Your primary key in users table

    public $timestamps = false; // Since your migration does not include 'updated_at' and 'created_at'

    protected $fillable = [
        'user_name',   // Column name from your DB
        'user_email',  // Column name from your DB
        'user_password', // Column name from your DB
    ];

    protected $hidden = [
        'user_password', // Ensure password is not exposed
        'remember_token',
    ];

    protected $casts = [
        'user_password' => 'hashed', // Ensures automatic hashing
    ];
}
