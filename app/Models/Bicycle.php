<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'price_per_hour',
        'stock',
        'status',
        'image',
    ];

    /**
     * Get the admin user that owns the bicycle.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the rentals for the bicycle.
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
