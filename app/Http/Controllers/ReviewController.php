<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use App\Models\review;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Session;

    class ReviewController extends BaseController{

        public function show()
        {
            if(!Session::get('user_id'))
            {
                 return redirect('login');
            }
            
            $user = User::find(Session::get('user_id'));
            return view('recensioni')->with('username', $user->username); 
        }

        public function LoadReviews(){
                $recensioni = Review::all();
                return json_encode($recensioni);
        }

        public function store(){
            if(!Session::get('user_id'))
            {
                 return [];// restituisco array vuoto
            }

            if(strlen(request('review')) == 0)
              {
                    $error = Session::get('error');
                    Session::put('error', 'campo_vuoto');
                    return redirect('recensioni')->with('error', $error)->withinput();
              } 
            
            $review = new Review;
            
            $user = User::find(Session::get('user_id'));
            $review->username = $user->username;
            $review->recensione = request('review');

            $review->save();

            return redirect('recensioni');
        }
    }

    
?>