<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;

class Article extends Model
{
    use HasFactory , SoftDeletes;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // protected function tags():CastsAttribute
    // {
    //     return CastsAttribute::make(

    //         get: fn ($value) => json_decode($value, true),

    //         set: fn ($value) => json_encode($value),

    //     );

    // }

}