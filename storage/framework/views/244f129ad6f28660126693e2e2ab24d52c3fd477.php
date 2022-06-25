<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(url('css/signup.css')); ?>">
    <script src="'<?php echo e(url('js/signup.js')); ?>" defer></script>

    <title>The Path - Signup</title>
  </head>

    <body>
      <div class="menu">
        <main>
             <img src="images/manubrio.png" alt="">
             <h2>|Signup|</h2>
             <?php if($error == 'campo_vuoto'): ?>
             <section class='errorS'>Hai scordato di compilare tutti i campi!</section></br>
             <?php elseif($error == 'errPSW'): ?>
             <section class='errorS'>Le password non corrispondono!</section></br>
             <?php elseif($error == 'existing'): ?>
             <section class='errorS'>Username già esistente!</section></br>
             <?php elseif($error == 'existing_email'): ?>
             <section class='errorS'>Email già esistente!</section></br>
             <?php endif; ?>
          <form name='form_signup' method='post'>
            <?php echo csrf_field(); ?>
            <div>
              <label>Nome <input type='text' name='nome' class="nome" value='<?php echo e(old("nome")); ?>'></label>
              <span id="nome_span">Inserisci un nome valido</span></br>
            </div>
            <div>
              <label>Cognome <input type='text' name='cognome' class="cognome"
              value='<?php echo e(old("congome")); ?>'></label>
              <span id="cognome_span">Inserisci un cognome valido</span></br>
            </div>
            <div>
              <label>Username <input type='text' name='username' class="username"
              value='<?php echo e(old("username")); ?>'></label>
              <span id="username_span">Inserisci un valido username</span></br>
            </div>
            <div>
              <label>E-mail <input type='text' name='email' class="email"
              value='<?php echo e(old("email")); ?>'></label>
              <span id="email_span"> Inserisci la tua email</span></br>
            </div>
            <div>
              <label>Password <input type='password' name='password' class="password"
              value='<?php echo e(old("password")); ?>'></label>
              <span id="password_span">Inserisci una password valida</span></br>
            </div>
            <div>
              <label> Conferma Password <input type='password' name='confirm_password' class="confirm_password"
              value='<?php echo e(old("confirm_password")); ?>'></label>
              <span id="confirm_password_span">Le password non coincidono</span>
            <div class="submit">
              <label>&nbsp;<input type='submit' value="Signup" id="invio"></label></br>
            </div>
          </form>
           <div><p>Sei già registrato? <a href="<?php echo e(url('login')); ?>"> Login</a></p></div>
        </main>
      </div>
    </body>
</html><?php /**PATH C:\xampp\htdocs\homework\resources\views/signup.blade.php ENDPATH**/ ?>