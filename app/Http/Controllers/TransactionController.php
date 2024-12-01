<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function lastTransactions()
    {
        $user = auth()->user();
        $transactions = $user->balance->transactions()->orderByDesc('created_at')->take(5)->get();
        return TransactionResource::collection($transactions);
    }

    public function transactions()
    {
        $order = request()->order;
        $description = request()->description;
        $user = auth()->user();

        $transactions = $user->balance->transactions();
        $transactions = $description ? $transactions->where('description', 'like', '%' . $description . '%') : $transactions;
        $transactions = $order == 'asc' ? $transactions->orderBy('created_at') : $transactions = $transactions->orderByDesc('created_at');

        $transactions = $transactions->paginate(15);

        return view('transactions', compact(['transactions', 'order', 'description']));
    }
}
