<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CharacterService;
use Illuminate\Http\Request;

class CharacterController extends Controller
{

    public function __construct(private CharacterService $characterService) {}

    public function store(Request $request)
    {
        $character = $this->characterService->create($request->all(), $request->user()->id);

        return response()->json($character, 201);
    }
}
