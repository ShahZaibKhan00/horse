<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedSearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'search_name',
        'breed',
        'color',
        'gender',
        'min_price',
        'max_price',
        'min_age',
        'max_age',
        'min_height',
        'max_height',
        'rider_level',
        'skill_disciplines',
        'ad_type',
        'filters',
        'type',
    ];

    protected $casts = [
        'filters' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
