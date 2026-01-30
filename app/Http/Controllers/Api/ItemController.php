<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ItemService;

class ItemController extends Controller
{
    public function __construct(private ItemService $itemService) {}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'buy_price' => 'required|integer|min:0',
            'sell_price' => 'required|integer|min:0',
        ]);

        $item = $this->itemService->create($request->all());

        return response()->json($item, 201);
    }
}
