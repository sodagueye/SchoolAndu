<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;
    protected $fillable = [

        'nom',
        'telephone',
        'email',
        'sigle',
    //    ' user_id'

    ];


    public function transfert()
    {
        return $this->hasMany(Transfert::class);
    }
    public function eleve()
    {
        return $this->hasMany(Eleve::class);
    }
    public function classe()
    {
        return $this->hasMany(Classe::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
