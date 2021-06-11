<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function utenti(){
        return User::all();
    }
    public function autenticazione(){
        $errore='Credenziali errate';
        $dati=request();
        $passwordUtente=$dati->password;
        $passwordDatabase=User::select('password')->where('nome', $dati->utente)->first();
        if(password_verify($passwordUtente, $passwordDatabase['password'])){
            $utente=User::where('nome', $dati->utente)->first();
            Session::put('id_utente', $utente->id_utente);
            return redirect('home');
        }else{
            return view('login')->with('errore', $errore);
        }
    }
    public function logout(){
        Session::flush();
        return redirect('login');
    }
}