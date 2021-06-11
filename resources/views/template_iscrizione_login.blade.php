<!DOCTYPE html>
    <html>
        <head>
         <title>Moda & Co</title>
         <link rel="stylesheet" href="{{asset('/css/style.css')}}" />
         @yield('script')
         <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
            <header> 
                <div id="overlay">
                    <nav> 
                     <div id="logo">
                        Moda & Co
                     </div>
                     
                        <div id="menu">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </nav>  
                </div>
            </header>
            <section> 
                @yield('form')
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il secondo homework</p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>