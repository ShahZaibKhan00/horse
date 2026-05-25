<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstateSavedSearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'search_name',
        'location',
        'distance_min',
        'distance_max',
        'hr_miles',
        'price_min',
        'price_max',
        'acre_min',
        'acre_max',
        'bedrooms_min',
        'bedrooms_max',
        'bathrooms_min',
        'bathrooms_max',
        'heated_barn',
        'stall_min',
        'stall_max',
        'has_indoor_ring',
        'has_outdoor_ring',
        'fenced_grass',
        'fencing',
        'amenitie',
        'filters',
    ];

    protected $casts = [
        'filters' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
