<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    public function parentEleve()
    {
        return $this->belongsTo(ParentEleve::class);
    }

    
    public function facturePaiemant()
{
    return $this->hasOne(FacturePaiment::class);
}
}
