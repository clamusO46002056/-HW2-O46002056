<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use App\Models\Azienda;
use App\Models\Manager;
use App\Models\Modello;
use Illuminate\Support\Facades\Session;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class ModelliController extends Controller
{
    public function modelli(){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        if(!isset($session_id)){
            return view('benvenuto');
        }
        return view('modelli')
            ->with("utente", $utente)
            ->with('csrf_token', csrf_token());
    }

    public function getModelli(){
        $modelli=Modello::select('codice')->get();
        return $modelli;
    }

    public function inserisci($codice, $data, $nome, $genere, $nazione, $azienda, $ingaggio){
        $nuovoModello = new Modello;
        $nuovoModello->codice=$codice;
        $nuovoModello->data_nascita=$data;
        $nuovoModello->nome=$nome;
        $nuovoModello->sesso=$genere;
        $nuovoModello->nazionalita=$nazione;
        if($azienda!=='no_azienda'){
            $nuovoModello->azienda=$azienda;
        }
        $nuovoModello->ingaggio=$ingaggio;
        $nuovoModello->save();
        if($nuovoModello!=null){
            return json_encode(array('stato'=>true));
        } else {
            return json_encode(array('stato'=>false));
        }
    }

    public function cerca($genere, $manager, $nazione=-1){
        if($manager=='si'){
            $res=DB::table('modello')
                            ->join('contratto','modello.codice','=','contratto.codice_modello')
                            ->where('modello.sesso','=',$genere)
                            ->where('modello.nazionalita','=',$nazione)
                            ->get();
            if($nazione==-1){
                $res=DB::table('modello')
                            ->join('contratto','modello.codice','=','contratto.codice_modello')
                            ->where('modello.sesso','=',$genere)
                            ->get();
            }
        }else{
            //Query completa con left join
            $res=DB::table('modello')
                            ->leftjoin('contratto','modello.codice','=','contratto.codice_modello')
                            ->where('contratto.codice_manager', '=', null)
                            ->where('modello.sesso','=',$genere)
                            ->where('modello.nazionalita','=',$nazione)
                            ->get();
            if($nazione==-1){
                //Query con left join senza nazione
                $res=DB::table('modello')
                            ->leftjoin('contratto','modello.codice','=','contratto.codice_modello')
                            ->where('contratto.codice_manager', '=', null)
                            ->where('modello.sesso','=',$genere)
                            ->get();
            }
        }
        echo $res;
        //return $res;
    }
}