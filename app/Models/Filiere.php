<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    public function enseignants(){
        return $this->hasMany(Enseignant::class);
    }

    public function parcours(){
        return $this->hasMany(Parcours::class);
    }

    public function filiere_category(){
        return $this->belongsTo(FiliereCategory::class);
    }

}
