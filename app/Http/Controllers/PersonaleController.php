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

class PersonaleController extends Controller
{
    public function personale(){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        if(!isset($session_id)){
            return view('benvenuto');
        }
        return view('personale')->with("utente", $utente);
    }

    public function aggiungi($azienda){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        //Controllo che l'elemento esista
        $res=DB::table('preferiti')
            ->where('utente','=',$utente->id_utente)
            ->where('azienda','=',$azienda)
            ->first();
        if($res!=null){
            return json_encode(array('stato'=>false));
        }

        DB::table('preferiti')->insert(
            [
                'utente' => $utente->id_utente,
                'azienda'=> $azienda
            ]
            );
        
        return json_encode(array('stato'=>true));
        
    }

    public function preferiti(){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        return $utente->preferiti()->get();
    }

    public function prenotazioni(){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        return $utente->prenotazioni()->get();
    }
    public function elimina_prenotazione($value){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        $esito=DB::table('prenotazioni')
                    ->where('utente','=',$utente->id_utente)
                    ->where('evento','=',$value)
                    ->delete();
        if($esito){
            return json_encode(array('stato'=>true));
        } else {
            return json_encode(array('stato'=>false));
        }
    }

    public function elimina_preferito($value){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        $esito=DB::table('preferiti')
                    ->where('utente','=',$utente->id_utente)
                    ->where('azienda','=',$value)
                    ->delete();
        if($esito){
            return json_encode(array('stato'=>true));
        } else {
            return json_encode(array('stato'=>false));
        }
    }
}