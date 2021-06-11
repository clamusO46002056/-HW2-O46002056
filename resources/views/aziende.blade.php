@extends('template_sito')

@section('script')
<script src="{{asset('js/script_aziende.js')}}" defer></script>
@endsection

@section('section')
<div id="corpo">
    <nav>
        <h1>Marchi</h1>
        <input type='text'>
    </nav>
    <p>Troverai i preferiti nella sezione personale</p>
    <p>Clicca sull'immagine di una azienda per un'analisi delle sue vendite</p>
    <div id="contenitore">

    </div> <!-- Contenitore di tutti i marchi-->
                   
</div>

<div id="reports" class="nascondi">
    <div id="titolo">

    </div>
    <div id="analisi">

    </div> <!-- Contenitore dell'azienda da analizzare -->
</div>
@endsection