<?php

namespace App\Models;

use App\Models\HorseFavorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $guarded = [];
    
    public $casts = [
        'pro_imgs' => 'array',
    ];

    /**
     * Get all of the favorites for the Realstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horsrFavs(): HasMany
    {
        return $this->hasMany(HorseFavorite::class);
    }
}
