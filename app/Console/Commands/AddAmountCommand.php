<?php

namespace App\Console\Commands;

use App\Jobs\AddAmountJob;
use App\Models\User;
use Illuminate\Console\Command;
use Ramsey\Uuid\Type\Decimal;

use function Laravel\Prompts\text;

class AddAmountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'balance:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding amount to balance';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = text(
            label: 'Existing User Login *',
            placeholder: 'user@example.com',
            validate: ['email' => 'required|email|exists:users']
        );

        $amount = text(
            label: 'Adding Amount (positive or negative) *',
            validate: ['amount' => 'required|numeric|decimal:0,2|different:0']
        );

        $description = text(
            label: 'Operation Description',
            validate: ['description' => 'nullable|string']
        );

        $user = User::where('email', $email)->first();
        $balance = $user->balance;

        AddAmountJob::dispatch($balance, $amount, $description);
    }
}
