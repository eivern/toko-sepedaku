<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'bicycle_id',
        'duration_hours',
        'total_price',
        'status',
    ];

    /**
     * Get the admin user who created the rental.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the customer for the rental.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the bicycle for the rental.
     */
    public function bicycle()
    {
        return $this->belongsTo(Bicycle::class);
    }
}
