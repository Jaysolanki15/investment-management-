<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'property_name',
        'location',
        'value',
        'purchase_date',
        'property_type',
        'description',
    ];

    // Relationship: A Property belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
