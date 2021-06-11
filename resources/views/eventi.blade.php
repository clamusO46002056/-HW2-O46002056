@extends('template_sito')

@section('script')
<script src="{{asset('js/script_eventi.js')}}" defer></script>
@endsection

@section('section')
<h1 >Prossimi Eventi</h1>
<p id="aggiorna"> Clicca per aggiornare</p>
<div id="cont">
    <div id="eventi">

                
    </div> <!-- Contenitore di tutti gli eventi-->
</div>
@endsection