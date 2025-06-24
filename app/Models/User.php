<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the bicycles for the admin user.
     */
    public function bicycles()
    {
        return $this->hasMany(Bicycle::class);
    }

    /**
     * Get the customers for the admin user.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the rentals for the admin user.
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
