<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'filiere_category_id'
    ];
    public function filiere_category(){
        return $this->belongsTo(FiliereCategory::class);
    }
}
