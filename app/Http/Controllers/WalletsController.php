<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WalletsController extends Controller
{
    public function create()
    {
        return view('my-wallet');
    }

    public function store(Request $request)
    {
        $wallet = new Wallet([
            'cardholder_name' => $request->get('cardholder_name'),
            'card_number' => $request->get('card_number'),
            'cvv' => $request->get('cvv'),
            'expiration_date' => $request->get('expiration_date'),
            'balance' => $request->get('balance'),
        ]);
        $wallet->user()->associate(Auth::user());
        $wallet->save();

        return Redirect::route('buy.create');
    }
}
