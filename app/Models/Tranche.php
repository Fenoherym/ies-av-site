<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    use HasFactory;

    protected $fillable = [
        'isDroitOk',
        'isFirstTrancheOk'
    ];

    public function etudiants(){
        return $this->hasOne(Etudiant::class);
    }
}
