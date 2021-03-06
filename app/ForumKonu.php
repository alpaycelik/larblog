<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumKonu extends Model
{
    protected $table = 'forum_konular';
    protected $fillable = ['baslik', 'icerik', 'yazar', 'etiketler', 'slug', 'ana_baslik', 'goster' ,'sabit'];

    public function ana_baslik(){
        return $this->hasOne('App\Anabaslik', 'id', 'ana_baslik');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'yazar');
    }

    public function yorumlar(){
        return $this->hasMany('App\ForumYorum', 'forum', 'slug');
    }

}
