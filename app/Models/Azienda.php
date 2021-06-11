<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = "azienda";
    protected $primaryKey ="nome";
    protected $keyType="string";
    protected $autoIncrement= false;
    public $timestamps = false;

    public function utenti(){
        return $this->belongsToMany('App\Models\User','preferiti','azienda','utente');
    }
}