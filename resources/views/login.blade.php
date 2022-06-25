<html>
  <head>
    <link rel='stylesheet' href='{{ url("css/login.css") }}'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Path - Login</title>
  </head>

    <body>
      <div class="menu">
        <main>
             <img src="images/manubrio.png" alt="">
             <h2>|Login|</h2>
             @if($error == 'campo_vuoto')
              <section class='errorS'>Hai scordato di compilare tutti i campi!</section></br>
             @elseif($error == 'wrong_pass')
              <section class='errorS'> Password non valida!</section></br>
             @endif
           <form name='form_login' method="post">
                @csrf
             <div>
                <label>Username <input type='text' name='username' class="username"
                value ='{{ old("username")}}'></label></br>
             </div>
             <div>
                <label>Password <input type='password' name='password' class="password"></label></br>
             </div>
             <div class="login"><input type='submit' value="Login" class="invio"></div>
            </form>
            <p>Sei nuovo? <a href="{{ url('signup') }}">Signup</a></p>
        </main>
      </div>
    </body>

</html>