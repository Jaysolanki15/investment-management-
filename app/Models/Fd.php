<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fd extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'interest_rate',
        'start_date',
        'maturity_date',
        'bank_name',
        'account_number',
    ];

    // Relationship: A Fixed Deposit belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }   
}
