<?php

namespace App\Services;

use App\Models\GoldMovement;
use App\Models\Character;
use App\Models\Item;

class GoldService
{
    public function registerPurchase(Character $character, Item $item)
    {
        $amount = -$item->buy_price; //gasto

        GoldMovement::create([
            'character_id' => $character->id,
            'item_id' => $item->id,
            'amount' => $amount,
            'type' => 'compra'
        ]);

        $character->gold += $amount;
        $character->save();
    }

    public function registerSale(Character $character, Item $item)
    {
        $amount = $item->sell_price; //ingreso
        GoldMovement::create([
            'character_id' => $character->id,
            'item_id' => $item->id,
            'amount' => $amount,
            'type' => 'venta'
        ]);

        $character->gold += $amount;
        $character->save();
    }
}
