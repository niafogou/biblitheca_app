<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $table = 'livre';
    protected $fillable = [
        'libelle', 'description ', 'nb_pages', 'image','categorie_id', 'auteur_id', 'created_at', 'updated_at'
    ];
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'auteur_id');
    }
}

