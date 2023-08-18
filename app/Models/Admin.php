<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable
{
    use HasFactory , HasRoles, softDeletes;

    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
    }
    public function languages(){
        return $this->belongsToMany(Language::class , 'admin_languages');
    }


    protected static function boot() {
        parent::boot();

        static::deleting(function($admin) {
            $admin->user()->delete();

        });
    }
}
