<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Riwayatkategori extends Model
{
    protected $table = 'riwayat_kategori';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function kategori(){
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }

}