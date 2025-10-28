<?php

namespace App\Models;

use App\Models\Realstate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealStateFavorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'realstate_id',
    ];

    /**
     * Get the realstate that owns the RealStateFavorite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function realstate(): BelongsTo
    {
        return $this->belongsTo(Realstate::class);
    }
}
