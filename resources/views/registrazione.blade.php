@extends('template_iscrizione_login')

@section('script')
<script src="{{asset('js/gestore_iscrizioni.js')}}" defer></script>
@endsection

@section('form')

@if(isset($array))
    @foreach($array as $errore)
    <p>{{$errore}}</p>
    @endforeach
@endif

    <h1>Iscriviti al portale</h1>
    <a href="{{route('login')}}" id="iscrizione">Altrimenti clicca qui per accedere!</a>
    <div id="form_iscrizione">
        <form method='POST' name="iscrizione">
            <label>Utente <input type='text' name='utente'></label>
            <label>Password <input type='password' name='password'></label>
            <input name='_token' type='hidden' value="{{csrf_token()}}">
            <input type='submit' value='Accedi'>
        </form>
    </div>

@endsection