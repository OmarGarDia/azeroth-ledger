<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GoldService;
use App\Models\Character;
use App\Models\Item;

class GoldController extends Controller
{
    public function __construct(private GoldService $goldService) {}

    public function purchase(Request $request)
    {
        $request->validate([
            'character_id' => 'required|exists:characters,id',
            'item_id' => 'required|exists:items,id',
        ]);

        $character = Character::findOrFail($request->character_id);
        $item = Item::findOrFail($request->item_id);

        $this->goldService->registerPurchase($character, $item);

        return response()->json(['message' => 'Compra registrad'], 201);
    }

    public function sale(Request $request)
    {
        $request->validate([
            'character_id' => 'required|exists:characters,id',
            'item_id' => 'required|exists:items,id'
        ]);

        $character = Character::findOrFail($request->character_id);
        $item = Item::findOrFail($request->item_id);

        $this->goldService->registerSale($character, $item);

        return response()->json(['message' => 'Venta registrada'], 201);
    }

    public function history(Character $character)
    {
        $movements = $character->goldMovements()->latest()->get();

        return response()->json($movements);
    }
}
