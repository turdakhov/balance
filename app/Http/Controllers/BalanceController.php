<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Models\Balance;

class BalanceController extends Controller
{

    public function balance()
    {
        $user = auth()->user();
        $balance = $user->balance;

        return number_format($balance->amount, 2);
    }

}
