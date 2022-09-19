<?php

namespace App\Http\Controllers;

use App\Models\BuyCrypto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BuyCryptoController extends Controller
{
    public function create()
    {
        return view('buy-form');
    }
    public function store(Request $request)
    {
        $buyCrypto = new BuyCrypto([
            'crypto-dropdown' => $request->get('crypto-dropdown')
        ]);
        $buyCrypto->user()->associate(Auth::user());
        $buyCrypto->save();

        return Redirect::route('buy.crypto');
    }
    public function open()
    {
        return view('buy-crypto');
    }
}
