<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Balance extends Model
{
    protected $fillable = [
        'amount',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function addAmount(float $amount, string $description)
    {
        DB::transaction(function () use ($amount, $description) {
            $transaction = $this->transactions()->create([
                'amount' => $amount,
                'description' => $description,
            ]);
            $sum = $this->amount + $transaction->amount;
            if ($sum < 0) return false;

            $this->amount = $sum;
            $this->save();

            $transaction->is_success = 1;
            $transaction->save();
        });
    }
}
