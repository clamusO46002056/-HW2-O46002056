<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(){
        $session_id=session('id_utente');
        $utente=User::find($session_id);
        if(!isset($session_id)){
            return view('benvenuto');
        }
        return view('home')->with("utente", $utente);
    }

    public function notizie(){
    $API_KEY=env("KEY_NOTIZIE");
    $endpoint="https://newsapi.org/v2/everything?q=fashion&language=it&apiKey=";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $endpoint.$API_KEY);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    echo $result;
    }
}