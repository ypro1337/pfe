<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sous_Filiere extends Model
{
    use HasFactory;
    protected $fillable = ['designation','filiere_id'];


    public function Filiere () : BelongsTo
{
    return $this->belongsto(Filiere::class);
}
}


