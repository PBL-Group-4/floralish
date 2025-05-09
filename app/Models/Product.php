<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'category',
        'location',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        
        return asset('images/default-product.jpg');
    }
} 