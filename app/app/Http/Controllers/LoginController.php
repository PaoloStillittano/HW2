<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\support\Facades\Redirect;
    use Illuminate\Http\Request;
    use Session;
    use DB;

    class LoginController extends BaseController{
           
       //Registrazione
       function signup_form()
       {
              if(Session::get('user_id'))
              {
                     return redirect('home');
              }

              $error = Session::get('error');
              Session::forget('error');
              return view('signup')->with('error', $error);
       }

       function do_signup(){
              //validazione dati
              if(Session::get('user_id'))
              {
                     return redirect('home');
              }

              if(strlen(request('nome')) == 0 || strlen(request('cognome')) == 0 || strlen(request('username')) == 0 || 
                 strlen(request('email')) == 0 || strlen(request('password')) == 0 || strlen(request('confirm_password')) == 0)
              {
                     Session::put('error', 'campo_vuoto');
                     return redirect('signup')->withInput();
              } 
              else if(request('password') != request('confirm_password'))
              {
                     Session::put('error', 'errPSW');
                     return redirect('signup')->withInput();
              }
              else if(User::where('username', request('username'))->first())
              {
                     Session::put('error', 'existing');
                     return redirect('signup')->withInput();
              }              
              else if(User::where('email', request('email'))->first())
              {
                     Session::put('error', 'existing_email');
                     return redirect('signup')->withInput();
              } 
              //crezione utente
              $user = new User;
              $user->nome = request('nome');
              $user->cognome = request('cognome');
              $user->username = request('username');
              $user->email = request('email');
              $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
              $user->save();
              //login 
              Session::put('user_id', $user->id);
              //redirect alla home
              return redirect('home');
       }

       //Login
       function login_form()
       {
              if(Session::get('user_id'))
              {
                     return redirect('home');
              }

              $error = Session::get('error');
              Session::forget('error');
              return view('login')->with('error', $error);
       }

       function do_login(){
              //validazione dati
              if(Session::get('user_id'))
              {
                     return redirect('home');
              }

              if(strlen(request('username')) == 0 || strlen(request('password')) == 0)
              {
                     Session::put('error', 'campo_vuoto');
                     return redirect('signup')->withInput();
              } 
              $user = User::where('username', request('username'))->first();
              if(!$user || !password_verify(request('password'), $user->password))
              {
                     Session::put('error', 'wrong_pass');
                     return redirect('login')->withInput();
              }
              //login 
              Session::put('user_id', $user->id);
              //redirect alla home
              return redirect('home');
       }

       public function logout(){
              //distruggo la sessione
              Session::flush();
              return redirect('login');
       } 
     }

?>