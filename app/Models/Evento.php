<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "evento";
    protected $primaryKey ="nome";
    protected $keyType="string";
    protected $autoIncrement= false;
    public $timestamps = false;

    public function persone(){
        return $this->belongsToMany('App\Models\User','prenotazioni','nome','utente');
    }
}