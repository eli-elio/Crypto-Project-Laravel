<?php

namespace App\Models;

class CryptoNewsArticlesCollection
{
    private array $articles = [];

    public function __construct(array $articles)
    {
        foreach ($articles as $article) {
            $this->add($article);
        }
    }

    private function add(CryptoNewsArticle $article): void
    {
        $this->articles[] = $article;
    }

    public function getAll(): array
    {
        return $this->articles;
    }
}
