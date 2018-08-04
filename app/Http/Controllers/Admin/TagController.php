<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tag;
use Session;
use App\User;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct(){
          $this->middleware('auth');
     }

    public function index()
    {
        $users = User::all()->where('type','default')->count();
        $tags = Tag::all();
        return view('admin.tags.index')->withTags($tags)->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
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
            'tag' => 'required|max:30'
        ));
        $tag = new Tag();
        $tag->name = $request->tag;

        $tag->save();

        Session::flash('success', 'Tag was successfully created');
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::Find($id);
        $users = User::all()->where('type','default')->count();
        return view('admin.tags.single')->withTag($tag)->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all()->where('type','default')->count();
        $tag = Tag::Find($id);
        return view('admin.tags.edit')->withTag($tag)->withUsers($users);
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
        $tag = Tag::Find($id);
        $this->validate($request, array(
            'tag' => 'required|max:255'
        ));

        $tag->name = $request->tag;
        $tag->save();
        Session::flash('success', 'Successfully updated tag');
        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::Find($id);
        $tag->posts()->detach();

        $tag->delete();

        Session::flash('success', 'Tag was successfully deleted');
        return redirect()->route('tags.index');

    }
}
