<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'portfolio_id',
        'date',
        'coin_name',
        'ticker', 
        'type',
        'price',
        'units',
        'currency'
    ];

    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
