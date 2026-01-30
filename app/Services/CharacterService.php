<?php

namespace App\Services;

use App\Models\Character;

class CharacterService
{
    public function create(array $data, int $userId): Character
    {
        return Character::create([
            'user_id' => $userId,
            'name' => $data['name'],
            'realm' => $data['realm'],
            'class' => $data['class'],
            'gold' => 0,
        ]);
    }
}
