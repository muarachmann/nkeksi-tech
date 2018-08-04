<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        //
        $users = User::all()->where('type','default')->count();
        $categories = Category::all();
        return view('admin.categories.index')->withCategories($categories)->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'category' => 'required|max:30'
        ));
        $category = new Category();
        $category->name = $request->category;

        $category->save();

        Session::flash('success', 'Category was successfully created');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::Find($id);
        $users = User::all()->where('type','default')->count();
        return view('admin.categories.single')->withCategory($category)->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::Find($id);
        $users = User::all()->where('type','default')->count();
        return view('admin.categories.edit')->withCategory($category)->withUsers($users);
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
        $category = Category::Find($id);
        $this->validate($request, array(
            'category' => 'required|max:255'
        ));

        $category->name = $request->category;
        $category->save();
        Session::flash('success', 'Successfully updated category');
        return redirect()->route('categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::Find($id);
        Post::whereCategoryId($id)->update(['category_id' => null]);

        $category->delete();

        Session::flash('success', 'Category was successfully deleted');
        return redirect()->route('categories.index');
    }
}
