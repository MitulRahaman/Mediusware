<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balance = auth()->user()->balance;
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions', 'balance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $currentDate = date('l'); 
        $fee = 0;
        $totalWithdraw;
        $totalAmount = $request->amount;

        //fee calculation
        if($request->transaction_type == 'Withdraw' && $currentDate != "Friday")
        {
            $totalAmount -= 1000;
            
            if(auth()->user()->accountType == "Individual")
            {
                $fee = $totalAmount * 0.015 / 100 ;
            }

            else
            {
                $totalWithdraw += $request->amount;
                if($totalWithdraw>50000)
                    {
                        $fee = $totalAmount * 0.015 / 100 ;
                    }
                else 
                    {
                        $fee = $totalAmount * 0.025 / 100;
                    }
            }
        }

    

        if($request->transaction_type == 'Withdraw')
        {
            $request->amount *= -1;
        }

        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'transaction_type' => $request->transaction_type,
            'amount' => $request->amount,
            'fee' => $fee,
        ]);

        return redirect(route('transaction.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function filter()
    {
        $transactionsDepo = Transaction::all()->where('amount', '>', 0);
        $transactionsWith = Transaction::all()->where('amount', '<', 0);
        return view('transaction.filter', compact('transactionsDepo', 'transactionsWith'));
    }
}
