<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function getExcerpt(string $content, $max){
        return substr($content, 0, $max) . ' ... ';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
