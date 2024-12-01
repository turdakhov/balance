<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $balances = Balance::all();
        foreach ($balances as $balance) {
            $balance->amount = random_int(0, 99999999) / 10;
            $balance->save();
        }
    }
}
