<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug',
        'description',
        'image',
        'is_active'
    ];

    /**
     * Relation avec les produits (une catégorie a plusieurs produits)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Accesseur pour l'URL de l'image
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : asset('images/default-category.png');
    }
}