<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import manquant
class Book extends Model
{
    use HasFactory; // <-- Ajoutez cette ligne
    /**
     * Les champs modifiables
     */
    protected $fillable = [
        'title',
        'author', 
        'description',
        'published_at'
        // Ajoutez tous les champs que vous souhaitez pouvoir remplir
    ];

    protected $casts = [
        'published_at' => 'date'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
    
    

    

    // ... le reste de votre modèle ...

}