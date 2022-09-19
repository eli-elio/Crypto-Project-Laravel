<?php

namespace App\Http\Controllers;

use App\Models\CryptoAsset;
use App\Services\ListCryptoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CryptoAssetController extends Controller
{
    private ListCryptoService $listCryptoService;

    public function __construct(ListCryptoService $listCryptoService)
    {
        $this->listCryptoService = $listCryptoService;
    }

    public function index(): View
    {
        $cryptoAssets = $this->listCryptoService->execute();
        return view('dashboard', [
            'cryptoAssets' => $cryptoAssets
        ]);
    }
}
