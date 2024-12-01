<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $balances = Balance::all();
        foreach ($balances as $balance) {
            Transaction::factory()->count(random_int(5, 50))->create([
                'balance_id' => $balance->id,
            ]);
        }
    }
}
