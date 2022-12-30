<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenariat extends Model
{
    protected $fillable = [
        'name',
        'url',
        'logoImg'
    ];
    use HasFactory;
}
