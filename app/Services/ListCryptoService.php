<?php

namespace App\Services;

use App\Repositories\CryptoAssetsRepository;

class ListCryptoService
{
    private CryptoAssetsRepository $cryptoAssetsRepository;
    public function __construct(CryptoAssetsRepository $cryptoAssetsRepository)
    {
        $this->cryptoAssetsRepository = $cryptoAssetsRepository;
    }

    public function execute(): array
    {
        $cryptoSymbols = getenv('DEFAULT_SYMBOLS');

        return $this->cryptoAssetsRepository->getBySymbols(explode(',', $cryptoSymbols));
    }
}
