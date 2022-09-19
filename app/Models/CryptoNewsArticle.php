<?php

namespace App\Models;

class CryptoNewsArticle
{
    private string $headline;
    private string $summary;
    private string $url;
    private string $urlToImage;

    public function __construct(string $headline, string $summary, string $url, string $urlToImage)
    {
        $this->headline = $headline;
        $this->summary = $summary;
        $this->url = $url;
        $this->urlToImage = $urlToImage;
    }

    public function getHeadline(): string
    {
        return $this->headline;
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getUrlToImage(): string
    {
        return $this->urlToImage;
    }
}
