<?php

namespace App\Services;

use App\DTO\BuyerDTO;

class BuyerService
{
    private int $id;
    public ?array $data;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    protected function loadBuyerData(int $id): array
    {
        $buyer = file_get_contents(__DIR__ . "/../../mock/buyer.{$id}.json");
        return json_decode($buyer, true);
    }

    public function load(): void
    {
        $this->data = $this->loadBuyerData($this->id);
    }

    public function getBuyerDTO(): BuyerDTO
    {
        $this->load();
        return new BuyerDTO($this->data);
    }
}