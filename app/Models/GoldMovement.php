<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoldMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id',
        'item_id',
        'amount',
        'type',
    ];
}
