<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use App\Models\Azienda;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AziendeController extends Controller
{
    public function aziende(){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        if(!isset($session_id)){
            return view('benvenuto');
        }
        return view('aziende')->with("utente", $utente);
    }
    public function carica_aziende(){
        $aziende=Azienda::all();
        return $aziende;
    }
    public function analisi($nome){
        $res=DB::table('vendita')
                    ->join('lotto_gen','vendita.codice','=','lotto_gen.codice_lotto')
                    ->where('nome', '=', $nome)
                    ->get();
        return $res;
    }
}