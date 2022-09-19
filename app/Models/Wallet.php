<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    protected $fillable = ['cardholder_name', 'card_number', 'cvv', 'expiration_date', 'balance'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
