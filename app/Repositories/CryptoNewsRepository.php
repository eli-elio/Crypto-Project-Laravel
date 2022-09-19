<?php

namespace App\Repositories;

use App\Models\CryptoNewsArticlesCollection;

interface CryptoNewsRepository
{
    public function getByCategory(string $category): CryptoNewsArticlesCollection;
}
