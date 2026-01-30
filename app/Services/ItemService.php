<?php

namespace App\Services;

use App\Models\Item;
use App\Models\Character;
use App\Models\GoldMovement;

class ItemService
{
    public function create(array $data): Item
    {
        return Item::create($data);
    }

    public function calculateProfit(Item $item, Character $character): int
    {
        $purchases = GoldMovement::where('item_id', $item->id)
            ->where('character_id', $character->id)
            ->where('type', 'compra')
            ->sum('amount');

        $sales = GoldMovement::where('item_id', $item->id)
            ->where('character_id', $character->id)
            ->where('type', 'venta')
            ->sum('amount');

        return $sales + $purchases;
    }
}
