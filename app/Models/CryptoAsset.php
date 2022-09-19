<?php

namespace App\Models;

class CryptoAsset
{
    private string $symbol;
    private string $name;
    private float $price;
    private float $change;

    public function __construct(string $symbol, string $name, float $price, float $change)
    {
        $this->symbol = $symbol;
        $this->name = $name;
        $this->price = $price;
        $this->change = $change;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return number_format($this->price, 2, '.', '');
    }

    public function getChange(): float
    {
        return number_format($this->change, 2, '.', '');
    }
}
