<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSavedSearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'search_name',
        'location',
        'distance_min',
        'distance_max',
        'hr_miles',
        'name',
        'health',
        'holistic',
        'breeding',
        'leasing',
        'transport',
        'grooming',
        'recreational',
        'performance',
        'property',
        'boarding',
        'farrier',
        'consulting',
        'retail',
        'promotion',
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
