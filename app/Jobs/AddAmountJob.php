<?php

namespace App\Jobs;

use App\Models\Balance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Ramsey\Uuid\Type\Decimal;

class AddAmountJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Balance $balance,
        public float $amount,
        public string $description,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->balance->addAmount($this->amount, $this->description);
    }
}
