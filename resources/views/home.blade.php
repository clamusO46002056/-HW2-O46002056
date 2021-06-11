@extends('template_sito')

@section('script')
<script src="{{asset('js/script_notizie.js')}}" defer></script>
@endsection

@section('section')
<h1>Entra nel mondo della moda</h1>
<p> Da oggi è molto più semplice!</p>
<div id="sez">
    <div class="slot" id="slot1">
        <img src="{{asset('/css/immagini/negozio.jpg')}}"/>
        <h1>MARCHI</h1>
        <p>Scopri nuovi marchi</p>
    </div>
    <div class="slot" id="slot2">
        <img src="{{asset('/css/immagini/sfilata.jpg')}}"/>
        <h1>SFILATE</h1>
        <p>Partecipa a sfilate</p>
    </div> 
    <div class="slot" id="slot3">
        <img src="{{asset('/css/immagini/modelli2.jpg')}}"/>
        <h1>MODELLI</h1>
        <p>Trova dei modelli</p>
    </div>
</div>
<h1>Ultime notizie sul mondo della moda</h1>
<div id="contenitore">

</div> <!-- Contenitore di tutte le notizie-->
@endsection