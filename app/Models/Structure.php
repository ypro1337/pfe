<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Structure extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'parent_id','slug','is_enabled','siege_id','position'];

    public function siege () : BelongsTo
    {
        return $this->belongsTo(siege::class);
    }

    public function children()
    {
        return $this->hasMany(Structure::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Structure::class, 'parent_id');
    }

    // protected function fillStructure(Structure $structure,$create=false){
    //     // copy paste +
    // }
}
