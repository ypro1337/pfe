<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siege extends Model
{
    use HasFactory;
    protected $fillable = ['designation','adresse'];

    public function structure() : HasMany
    {
        return $this->hasMany(structure::class);
    }
}
