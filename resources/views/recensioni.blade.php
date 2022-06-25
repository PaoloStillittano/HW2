<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href='{{ url("css/recensioni.css") }}'>   
        <script src='{{ url("js/recensioni.js") }}' defer="true"></script>

        <title>The Path - Recensioni</title>
    </head>

    <body>
        <section class='grid'>
            <h2>Qui troverai tutte le recensioni della palestra</h2>
            <div class='cell'>

            </div>
         
            <form name='form' method="post" id="form_review" action="recensioni/create">
            @csrf
             <div>
                <span class="text_title"> lascia un commento:</span> 
             </div>
             <div>
                 <input type='text' name='review' class="user_review"></br>
             </div>
             <div class="invio_review"><input type='submit' value="invia Recensione" class="invio"></div>
            </form>
            <div class="menu">
                    <p><a href="{{ url('home') }}">Home</a></p></br>
                    <p><a href="{{ url('logout') }}"> Esci dalla sessione</a></p></br>
            </div>
        </section>
    </body>    
</html>