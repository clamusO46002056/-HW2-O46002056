<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modello extends Model
{
    protected $table = "modello";
    protected $primaryKey ="codice";
    protected $keyType="string";
    public $timestamps = false;

}