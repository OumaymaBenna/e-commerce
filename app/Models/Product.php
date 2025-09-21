<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'quantity',
        'image',
        'is_featured',
        'discount',
    ];

    /**
     * Relation avec la catégorie (un produit appartient à une catégorie)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}