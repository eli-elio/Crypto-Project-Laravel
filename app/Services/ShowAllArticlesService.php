<?php

namespace App\Services;

use App\Models\CryptoNewsArticlesCollection;
use App\Repositories\CryptoNewsRepository;

class ShowAllArticlesService
{
    private CryptoNewsRepository $cryptoNewsRepository;

    public function __construct(CryptoNewsRepository $cryptoNewsRepository)
    {
        $this->cryptoNewsRepository = $cryptoNewsRepository;
    }

    public function execute(string $category): CryptoNewsArticlesCollection
    {
        return $this->cryptoNewsRepository->getByCategory($category);
    }
}
