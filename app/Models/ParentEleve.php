<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentEleve extends Model
{
    use HasFactory;

    public function eleve()
    {
        return $this->hasMany(Eleve::class);
    }
    public function paiement()
{
    return $this->hasMany(Paiement::class);
}
// public function utilisateur()
// {
//     return $this->belongsTo(Utilisateur::class);
// }
}
