<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Team;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\User;
use Session;
use Image;
use App\Category;
use Faker\Provider\File;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        $users = User::all()->where('type','default')->count();
        return view('admin.posts.index')->withUsers($users)->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $team = Team::all();
        $users = User::all()->where('type','default')->count();
       return view('admin.posts.create')->withTags($tags)->withTeam($team)->withCategories($categories)->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
        	'title' => 'required|max:255',
	        'editor1' => 'required',
            "category" => "required|max:255",
            "author" => "required|max:255"
        ));
             //creating new instance of the post
        $post = new Post();

            //grabbing the data into the post object
        $post->title = $request->title;
        $post->body = $request->editor1;
        $post->category_id = $request->category;
        $post->team_id = $request->author;

        //getting image and storing
         if ($request->hasFile('featured_file')){
		
		    if(!file_exists(public_path('../../nkeksi-tech.com/img/blogPosts/'))){
			    \File::makeDirectory(public_path('../../nkeksi-tech.com/img/blogPosts/'));
		    }
		    
	    	$image = $request->file('featured_file');
	    	
            $location = public_path('../../nkeksi-tech.com/img/blogPosts/');
            $filename = time().'.'.$image->getClientOriginalExtension();
		    $image->move($location,$filename);
		    $post->featured_file = $filename;
	    }
	    
       
	
            //saving post into the database
        $post->save();
        $post->tags()->sync($request->tags, false);

	    session()->flash('success', 'Successfully created blog post!');
        
        Session::flash('success', 'Blog post was created successfully');
	    return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a single post
        
        $post = Post::Find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $team = Team::all();
        $users = User::all()->where('type','default')->count();
	    return view('admin.posts.single')->withPost($post)->withTags($tags)->withUsers($users)->withCategories($categories)->withTeam($team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, array(
            'title' => 'required|max:255',
            'editor1' => 'required',
            "category" => "required|max:255",
            "author" => "required|max:255",
        ));
        //getting  instance of the post
        $post = Post::Find($id);
        //getting image and storing
        if ($request->hasFile('myFile')) {
            $image = $request->file('myFile');

            $location = public_path('../../nkeksi-tech.com/img/blogPosts/');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($location, $filename);
            $oldfile = $post->featured_file;
            $post->featured_file = $filename;

            \File::delete('../../nkeksi-tech.com/img/blogPosts/'.$oldfile);
        }


        //grabbing the data into the post object
        $post->title = $request->title;
        $post->body = $request->editor1;
        $post->category_id = $request->category;
        $post->team_id = $request->author;


        //saving post into the database
        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags, true);
        }
        else{
            $post->tags()->sync(array());
        }



        Session::flash('success', 'Blog post was updated successfully');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $oldfile = $post->featured_file;
        $postId = $post->id;

        \File::delete('img/events/'.$oldfile);
        $post->find($postId)->comments()->delete();
        $post->find($postId)->tags()->sync(array());

        $post->delete();
        Session::flash('success', 'Post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
