<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'adresse', 'ville', 'codepostal', 'pays', 'email'
    ];
}
