@extends('template_sito')

@section('script')
<script src="{{asset('js/script_modelli.js')}}" defer></script>
@endsection

@section('section')
<h1>Aggiungi un modello al database</h1>
                <p>Il campo 'Azienda' può essere omesso nel caso di modello che non collabora con aziende</p>
                <div class="form_modello">
                    <form method='POST' name="aggiungi_modello">
                        <label>Codice <input type='text' name='codice'></label>
                        <label>Data di nascita <input type='date' name='data'></label>
                        <label>Nome e Cognome <input type='text' name='nome'></label>
                        <label class="radio">
                            <input type='radio' name='genere' value='Maschio'>Uomo
                            <input type='radio' name='genere' value='Femmina'>Donna
                        </label>
                        <label>Nazione <input type='text' name='nazione'></label>
                        <label>Azienda <input type='text' name='azienda'></label>
                        <label>Ingaggio <input type='number' name='ingaggio'></label>
                        <input name='_token' type='hidden' value='{{$csrf_token}}'>
                        <input type='submit' value='Aggiungi'>
                    </form>
                </div>
                <h1>Cerca un modello</h1>
                <p>Il campo 'Nazione' può essere omesso</p>
                <div class="form_modello">
                    <form action="" method='POST' name="cerca_modello">
                        <label class="radio">
                            <input type='radio' name='genere' value='Maschio'>Uomo
                            <input type='radio' name='genere' value='Femmina'>Donna
                        </label>
                        <label>Nazione <input type='text' name='nazione'></label>
                        <label class="radio"> Manager
                            <input type='radio' name='manager' value='si'>Si
                            <input type='radio' name='manager' value='no'>No
                        </label>
                        <input name='_token' type='hidden' value='{{$csrf_token}}'>
                        <input type='submit' value='Cerca'>
                    </form>
                </div>

                <div id="contenitore">

                </div> <!-- Contenitore di tutti i modelli-->
@endsection