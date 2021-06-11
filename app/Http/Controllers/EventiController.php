<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use App\Models\Evento;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class EventiController extends Controller
{
    public function eventi(){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        if(!isset($session_id)){
            return view('benvenuto');
        } else{
            return view('eventi')->with("utente", $utente);
        }
    }

    public function prossimi_eventi(){
        $API_KEY=env("KEY_EVENTI");
        $endpoint="https://app.ticketmaster.com/discovery/v2/events.json?keyword=fashion%20show&sort=date,asc&apikey=";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint.$API_KEY);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
    }

    public function aggiungi($nome,$data){
        $esito=Evento::find($nome);
        if(!$esito){
            $evento = new Evento;
            $evento->nome=$nome;
            $evento->data=$data;
            $evento->save();
        }
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        $esito=DB::table('prenotazioni')
                ->where('utente','=',$utente->id_utente)
                ->where('evento','=',$nome)
                ->first();
        if(!$esito){
            $res=DB::table('prenotazioni')->insert([
                'utente'=>$utente->id_utente,
                'evento'=>$nome
            ]);
            return json_encode(array('stato'=>true));
        } else{
            return json_encode(array('stato'=>false));
        }
    }
}