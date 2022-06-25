<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href='{{ url("css/home.css") }}'>
        <script src='{{ url("js/posts.js") }}' defer="true"></script>
        
        <title>The Path - Home</title>
    </head>
    <body>
        <header>
            <h1><strong>|CrossFit: The Path|</strong></br></h1>
        </header>
      
        <section>
            <div class="menu">
                <h2>Benvenuto {{ $username }}!</h2>
                <div class='prova'>
                    <p><a href="{{ url('recensioni') }}">Recensioni</a></p></br>
                    <p><a href="{{ url('search') }}">Search</a></p></br>
                    <p><a href="{{ url('logout') }}"> Esci dalla sessione</a></p></br>
                </div>
            </div>
            <h1>I nostri corsi !</h1>
             <div class='posts'>
                    
             </div>
        </section>
    </body>

    <footer>
        <h1>Corso di Web Programming 2022</h1>
        <p>Paolo Stillittano - MATRICOLA: 1000001637</p>
    </footer>
</html>