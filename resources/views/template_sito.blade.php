<!DOCTYPE html>
    <html>
        <head>
         <title>Moda & Co</title>
         <link rel="stylesheet" href="{{asset('/css/style.css')}}" />
         <meta name="viewport" content="width=device-width, initial-scale=1">
         @yield('script')
         
        </head>
        <body>
            <header> 
                <div id="overlay">
                    <nav> 
                     <div id="logo">
                        Moda & Co
                     </div>
                     <div id="links">
                         <a href="{{route('profilo')}}">{{$utente->nome}}</a>
                         <a href="{{route('home')}}">Home</a>
                         <a href="{{route('aziende')}}">Aziende</a>
                         <a href="{{route('eventi')}}">Eventi</a>
                         <a href="{{route('modelli')}}">Modelli</a>
                         <a href="{{route('logout')}}">Logout</a>
                        </div>
                        <div id="menu">
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                    </nav>  <!-- Barra di navigazione -->  
                </div>
            </header><!-- Intestazione-->
            <section> 
            @yield('section')
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il secondo homework </p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>