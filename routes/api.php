<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/last-transactions', [TransactionController::class, 'lastTransactions']);
    Route::get('/balance', [BalanceController::class, 'balance']);
});
