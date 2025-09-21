<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Assure-toi que cette ligne est présente
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable // La classe User doit étendre Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        // ajoute ici tous les champs que tu veux insérer
    ];
}