<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "utente";
    protected $primaryKey ="id_utente";
    public $timestamps = false;

    public function preferiti(){
        return $this->belongsToMany('App\Models\Azienda','preferiti','utente','azienda');
    }

    public function prenotazioni(){
        return $this->belongsToMany('App\Models\Evento','prenotazioni','utente','evento');
    }
    
}
