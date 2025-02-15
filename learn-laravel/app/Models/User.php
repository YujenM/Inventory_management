<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable; // Removed HasApiTokens since we're using JWT

    protected $table = 'users'; 
    protected $primaryKey = 'user_id'; 
    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'user_email',
        'password', // Changed from 'user_password' to 'password' for Laravel compatibility
    ];

    protected $hidden = [
        'password', // Changed from 'user_password'
        'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the JWT token.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key-value array containing any custom claims for the JWT.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
