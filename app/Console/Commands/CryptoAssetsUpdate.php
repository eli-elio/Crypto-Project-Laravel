<?php

namespace App\Console\Commands;

use App\Models\CryptoAsset;
use App\Services\ListCryptoService;
use Illuminate\Console\Command;

class CryptoAssetsUpdate extends Command
{
    protected $signature = 'quote:assets_update';
    protected $description = 'latest crypto assets into database';

    public function handle(ListCryptoService $listCryptoService)
    {
        $listCryptoService->execute();

        $this->info('database is updated');
    }
}
