<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MyCryptocurrencies extends Model
{
    protected $fillable = ['symbol', 'price', 'amount', 'price_payed'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
