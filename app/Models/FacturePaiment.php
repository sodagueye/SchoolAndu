<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturePaiment extends Model
{
    use HasFactory;

    public function paiment()
    {
        return $this->belongsTo(Paiement::class);
    }
}
