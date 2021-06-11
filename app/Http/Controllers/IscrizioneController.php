<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class IscrizioneController extends Controller
{
    public function registrazione(){
        return view('registrazione');
    }

    public function crea(){
        $errori=0;
        $lista_errori=array();
        $dati=request();
        //Verifica che l'username sia disponibile
        $utente= User::where('nome', $dati->utente)->first();
        if($utente!=null){
            $errori++;
            array_push($lista_errori,"Nome utente non disponibile");
        }
        //Verifico che la password rispetti il pattern
        if(strlen($dati->password)<5||strlen($dati->password)>20){
            $errori++;
            array_push($lista_errori,"La password deve essere compresa tra 5 e 20 caratteri");
        }
        if(!(preg_match("^[A-Z]^",$dati->password))){
            $errori++;
            array_push($lista_errori,"La password deve contenere una lettera maiuscola");
        }
        //In caso di assenza di errori aggiungo l'utente al database
        $nuovoUtente= new User;
        $nuovoUtente->nome=$dati->utente;
        $nuovoUtente->password=password_hash($dati->password, PASSWORD_BCRYPT);
        
        if($errori==0){
            $nuovoUtente->save();
            return redirect('login');
        }else{
            return view('registrazione')->with("array", $lista_errori);
        }
        
    }
}