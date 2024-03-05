<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'stadium',
        'numMembers',
        'budget'
    ];

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }
}
