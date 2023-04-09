<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filiere extends Model
{
    use HasFactory;


    public function Sous_Filieres () : HasMany
{
    return $this->hasMany(Sous_Filiere::class);
}
}



