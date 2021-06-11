@extends('template_sito')

@section('script')
<script src="{{asset('js/script_preferiti.js')}}" defer></script>
<script src="{{asset('js/script_prenotazioni.js')}}" defer></script>
@endsection

@section('section')
<div id="corpo">
    <div class="nascondi" id="box_pref">
        <h1>I tuoi preferiti</h1>
        <div id="preferiti">

        </div> <!-- Contenitore di tutti i preferiti-->
    </div>   
                    
    <div id="box_eventi">
        <h1>I tuoi eventi</h1>
        <div id="prenotazioni">
        
        </div> <!-- Contenitore di tutti i preferiti-->
    </div>
</div>
@endsection