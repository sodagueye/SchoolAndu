<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['telephoneParent', 'otp', 'expires_at'];

    public $timestamps = true;
}
