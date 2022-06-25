<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use Session;
    use App\Models\User;
    use DB;

    class SpotifyController extends BaseController{

        function search()
        {
               if(!Session::get('user_id'))
               {
                    return redirect('login');
               }
               
               $user = User::find(Session::get('user_id'));
               return view('search')->with('username', $user->username); 
        }

        public function search_song(){

            if(!Session::get('user_id'))
            {
                 return redirect('login');
            }

            //ricerca spotify
            $client_id = "5f7a75439d5a4be9b034b9ed3137d765";
            $client_secret = "fa215063a3cd4a1b989b08d1667e3aa6";

            //RICHIESTA
             $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
            curl_setopt($curl, CURLOPT_POST, 1);
   
            curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
  
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

            $token =json_decode(curl_exec($curl), true);

            curl_close($curl);
    
            //TRACCIA
            $track=urlencode($_GET["track"]);
            $urlSpotify="https://api.spotify.com/v1/search?type=track&q=";
            $url=$urlSpotify .$track;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token["access_token"])); 
            $result=curl_exec($curl);
            echo $result;

            curl_close($curl);
        }

    }

?>