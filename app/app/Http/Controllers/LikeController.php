<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use Session;
    use App\Models\User;
    use DB;
    use Auth;
    use post;
    use like;

    class LikeController extends BaseController{

        function likeLog()
        {
               if(!Session::get('user_id')) 
               {
                    return redirect('login');
               }
               
               $user = User::find(Session::get('user_id'));
               return view('home')->with('username', $user->username); 
        }

        public function like($post){
            $post_id = $post;
            $user_id = Auth::user()->id;
            $like = new like();
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->like = 1;
            $like->save();

            return back()->with('mess', 'hai messo mi piace');
        }

        public function unlike($post_id){
            echo ("rimosso");
            $post = DB::table('likes')->where('post', $post_id)->delete();
            return ;
        }

    }

?>