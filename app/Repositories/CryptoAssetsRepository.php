<?php

namespace App\Repositories;

interface CryptoAssetsRepository
{
    public function getBySymbols(array $symbols): array;
}
