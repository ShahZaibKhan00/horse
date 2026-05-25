<?php

namespace App\Models;

use App\Models\HorseFavorite;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Get all of the favorites for the Realstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversation(): HasMany
    {
        return $this->hasMany(Conversation::class, 'id', 'product_id');
    }

    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
