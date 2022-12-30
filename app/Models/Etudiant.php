<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }
    public function parcours(){
        return $this->belongsTo(Parcours::class);
    }
    public function tranche(){
        return $this->hasOne(Tranche::class);
    }
}
