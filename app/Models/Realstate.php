<?php

namespace App\Models;

use App\Models\RealStateFavorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Realstate extends Model
{
    use HasFactory;

    protected $primartKey = 'id';

    /**
     * Get all of the favorites for the Realstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(RealStateFavorite::class);
    }
}