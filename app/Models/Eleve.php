<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'ien',
        'nom',
        'prenom',
        'dateDeNaissance',
        'sexe',
        'telephoneParent',
    ];

    // Define any date casts
    protected $casts = [
        'dateDeNaissance' => 'date',
    ];
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
    public function parentEleve()
    {
        return $this->belongsTo(ParentEleve::class);
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
