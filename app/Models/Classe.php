<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function eleve()
    {
        return $this->hasMany(Eleve::class);
    }
}
