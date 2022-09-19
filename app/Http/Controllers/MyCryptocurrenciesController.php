<?php

namespace App\Http\Controllers;

use App\Models\MyCryptocurrencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MyCryptocurrenciesController extends Controller
{
    public function show()
    {
        return view('my-crypto');
    }

    public function store(Request $request)
    {
        $symbol = DB::table('buy_crypto')->where('user_id', '2')->value('crypto-dropdown');
        $price = (DB::table('crypto_assets')->where('symbol', DB::table('buy_crypto')->where('user_id', '2')->value('crypto-dropdown'))->orderBy('id', 'desc')->value('price')) * $request->get('amount');
        $myCrypto = new MyCryptocurrencies([
            'symbol' => $symbol,
            'price' => DB::table('crypto_assets')->where('symbol', DB::table('buy_crypto')->where('user_id', '2')->value('crypto-dropdown'))->orderBy('id', 'desc')->value('price'),
            'amount' => $request->get('amount'),
            'price_payed' => $price,
        ]);
        $myCrypto->user()->associate(Auth::user());
        $myCrypto->save();

        $newBalance = (DB::table('wallets')->where('user_id', '2')->value('balance')) - $price;

        DB::table('wallets')->where('user_id', '2')->update(['balance'=>$newBalance]);
        return Redirect::route('my-crypto');
    }

    public function sell()
    {
        return view('crypto-sell');
    }

    public function confirm(Request $request)
    {
        $sellAmount = $request->get('amount-sell');
        $newAmount = (DB::table('my_cryptocurrencies')->where('user_id', 2)->value('amount')) - $sellAmount;
        $price = DB::table('crypto_assets')->where('symbol', DB::table('buy_crypto')->where('user_id', '2')->value('crypto-dropdown'))->orderBy('id', 'desc')->value('price') * $sellAmount;
        $restoreBalance = (DB::table('wallets')->where('user_id', '2')->value('balance')) + $price;
        DB::table('wallets')->where('user_id', '2')->update(['balance'=>$restoreBalance]);
        DB::table('my_cryptocurrencies')->where('user_id', 2)->update(['amount'=>$newAmount]);

        return Redirect::route('dashboard');
    }
}
