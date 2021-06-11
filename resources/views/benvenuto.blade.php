@extends('template_iscrizione_login')

@section('form')
<h1>Entra nel mondo della moda</h1>
<p> Da oggi è molto più semplice!</p>
<a href="{{route('login')}}"> Clicca qui per effettuare l'accesso</a>
<p> o</p>
<a href="{{route('registrazione')}}"> Clicca qui per effettuare l'iscrizione</a>
@endsection