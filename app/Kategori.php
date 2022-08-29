<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function riwayat(){
        return $this->hasMany('App\Riwayatkategori');
    } 

}