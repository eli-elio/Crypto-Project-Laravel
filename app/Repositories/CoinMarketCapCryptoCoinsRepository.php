<?php

namespace App\Repositories;

use App\Models\CryptoAsset;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CoinMarketCapCryptoCoinsRepository implements CryptoAssetsRepository
{
    public function getBySymbols(array $symbols): array
    {
        $crypto = Cache::remember(implode('_', $symbols), 30, function() use ($symbols) {
            $response =  Http::withHeaders([
                'X-CMC_PRO_API_KEY' => getenv("COIN_MARKET_CAP_API_KEY")
            ])->get('https://pro-api.coinmarketcap.com/v2/cryptocurrency/quotes/latest?symbol=' . implode(",", $symbols));

            return json_decode($response->body(), true)["data"];
        });

        $cryptoAssets = [];

        foreach ( $crypto as $symbol => $cryptoAsset)
        {
            $cryptoAssets[] = new CryptoAsset(
                $symbol,
                $cryptoAsset[0]['name'],
                $cryptoAsset[0]['quote']['USD']['price'],
                $cryptoAsset[0]['quote']['USD']['percent_change_24h'],
            );

            DB::table('crypto_assets')->updateOrInsert([
                'symbol' => $symbol,
                'name' => $cryptoAsset[0]['name'],
                'price' => $cryptoAsset[0]['quote']['USD']['price'],
                'percent_change_24h' => $cryptoAsset[0]['quote']['USD']['percent_change_24h']]);
        }
        return $cryptoAssets;
    }
}
