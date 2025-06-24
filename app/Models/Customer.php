<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
    ];

    /**
     * Get the admin user that owns the customer data.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the rentals for the customer.
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
