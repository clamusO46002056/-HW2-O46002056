@extends('template_iscrizione_login')

@section('script')
<script src="{{asset('js/gestore_login.js')}}" defer></script>
@endsection

@section('form')
<h1>Accedi al portale</h1>

@if(isset($errore))
<p>Credenziali errate!</p>
@endif

<a href="{{route('registrazione')}}" id="iscrizione">Altrimenti clicca qui per iscriverti!</a>
                
    <div id="form_login">
        <form method='POST' name="login">
            <label>Utente <input type='text' name='utente'></label>
            <label>Password <input type='password' name='password'></label>
            <input name='_token' type='hidden' value="{{csrf_token()}}">
            <input type='submit' value='Accedi'>
        </form>
    </div>

@endsection