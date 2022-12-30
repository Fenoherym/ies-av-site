<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiliereCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function filieres(){
        return $this->hasMany(Filiere::class);
    }

    public function admissions(){
        return $this->hasMany(Admission::class);
    }

    public function concours(){
        return $this->hasMany(Concours::class);
    }
}
