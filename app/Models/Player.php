<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'surname',
        'position',
        'salary'
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
