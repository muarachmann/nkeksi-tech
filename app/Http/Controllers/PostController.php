<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Post;
use App\Team;
use App\Comment;
class PostController extends Controller
{
     public function index()
    {
        $team = Team::orderBy('id','desc')->paginate(4);
    	$posts = Post::orderBy('id','desc')->paginate(14);
    	$recentposts = Post::orderBy('id','desc')->paginate(4);
        return view('blog.index')->withPosts($posts)->withRecentposts($recentposts)->withTeam($team);
    }

     public function show($id)
    {
        //show a single post
        $post = Post::find($id);
        $team = Team::orderBy('id','desc')->paginate(4);
        $recentposts = Post::orderBy('id','desc')->paginate(4);
        $comments = Comment::find($id);
        $next = Post::where('id', '>', $post->id)->first();
        $previous = Post::where('id', '<', $post->id)->first();
	    return view('blog.single')->withPost($post)->withRecentposts($recentposts)->withTeam($team)->withComments($comments)->withNext($next)->withPrevious($previous);
    }

    public function quickRegister(Request $request){
            $location = $request->location;
            $name = $request->myName;
            $email = $request->myEmail;
            $course = $request->course;

            return redirect()->to('/register')->withLocation($location)->withName($name)->withEmail($email);
    }

    public function likePost(Request $request){
         $postId = $request->postId;
         $post = Post::Find($postId);
         $isLike = true;
         $update = false;

         $user = \Auth::user();


         $userLiked = $user->likes()->where('post_id',$postId)->first();

         if($userLiked){
            $alreadyLike = $userLiked->like;
             $update = true;
            if($alreadyLike == true){
                $isLike = false;
            }else{

            }

         }else{
             //i dont have a like for this post
             $userLiked = new Like();
         }

         $userLiked->like = $isLike;
         $userLiked->user_id = $user->id;
         $userLiked->post_id = $post->id;

         if($update){
             $userLiked->update();
         }
         else{
             $userLiked->save();
         }

        $userLiked->total = $post->likes->where('like', 1)->count();

        //return whether like or dislike
             return $userLiked;

    }

}
