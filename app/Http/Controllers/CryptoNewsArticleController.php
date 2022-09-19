<?php

namespace App\Http\Controllers;

use App\Services\ShowAllArticlesService;
use Illuminate\View\View;

class CryptoNewsArticleController extends Controller
{
    private ShowAllArticlesService $service;

    public function __construct(ShowAllArticlesService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $category = getenv("DEFAULT_CATEGORY");
        return view('crypto-news', ["cryptoNews" => $this->service->execute($category)->getAll()]);
    }
}
