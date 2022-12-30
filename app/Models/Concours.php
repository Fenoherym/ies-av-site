<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Concours extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function annee_scolaire(){
        return $this->BelongsTo(AnneeScolaire::class);
    }

    public function filiere_category(){
        return $this->belongsTo(FiliereCategory::class);
    }


}
