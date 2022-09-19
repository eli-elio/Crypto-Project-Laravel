<?php

namespace App\Repositories;

use App\Models\CryptoNewsArticle;
use App\Models\CryptoNewsArticlesCollection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CryptoNewsApiArticleRepository implements CryptoNewsRepository
{
    public function getByCategory(string $category = "crypto"): CryptoNewsArticlesCollection
    {
        $news = Cache::remember($category, 30, function() {
            $response = Http::withHeaders([
                'X-Finnhub-Token' => getenv("NEWS_API_KEY")
            ])->get('https://finnhub.io/api/v1/news?category=crypto');
            return json_decode($response->body(), true);
        });

        $articles = [];

        foreach ($news as $article) {
            $articles[] = new CryptoNewsArticle(
                $article["headline"],
                $article["summary"],
                $article["url"],
                $article["image"]
            );
        }
        return new CryptoNewsArticlesCollection($articles);
    }
}
