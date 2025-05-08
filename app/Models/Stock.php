<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'user_id',
        'stock_name',
       
        'quantity',
        'purchase_price',
        
        'purchase_date',
    ];

    // Relationship: A Stock belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
