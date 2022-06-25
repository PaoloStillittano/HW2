<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use Session;
    use App\Models\User;
    use DB;
    use Auth;
    use post;
    use App\Models\like;

    class PostController extends BaseController{

        function home()
        {
               if(!Session::get('user_id'))
               {
                    return redirect('login');
               }
               
               $user = User::find(Session::get('user_id'));
               return view('home')->with('username', $user->username); 
        }

        public function list(){

            //controllo il login
            if(!Session::get('user_id'))
            {
                 return [];// restituisco array vuoto
            }
            //leggo i posts
            $post = DB::table("posts")->get();
            return $post;

            $like = DB::table("likes")->get();
              echo $like;
        }

        public function like($post){
            //echo $post;
            if(!Session::get('user_id'))
            {
                 return [];// restituisco array vuoto
            }
            $user = User::find(Session::get('user_id'));
            $username = $user->username;
            $title = $post;
            $like = new like();
            $like->post = $title;
            $like->user = $username;
            $like->save();
        }

        public function unlike($post_id){
            $post = DB::table('likes')->where('post', $post_id)->delete();
            echo ("rimosso ora\n");
            
        }
    }
?>