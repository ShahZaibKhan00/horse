<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Realstate;
use App\Models\Service;


class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'product_id', 'product_type'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function horse()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function realestate()
    {
        return $this->belongsTo(Realstate::class, 'product_id');
    }

    public function productName() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'product_id');
    }

    public function product()
    {
        // This is a dynamic polymorphic-like relationship based on product_type
        if ($this->product_type == 'horse') {
            return $this->belongsTo(Product::class, 'product_id');
        } elseif ($this->product_type == 'real_estate' || $this->product_type == 'realestates') {
            return $this->belongsTo(Realstate::class, 'product_id');
        } elseif ($this->product_type == 'services') {
            return $this->belongsTo(Service::class, 'product_id');
        }
        return null;
    }
}
