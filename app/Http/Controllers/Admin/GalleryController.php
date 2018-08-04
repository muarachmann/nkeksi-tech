<?php

namespace App\Http\Controllers\Admin;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Gallery;
use Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::orderBy('id','desc')->paginate(25);
        $users = User::all()->where('type','default')->count();
        return view('admin.accessories.gallery.index')->withUsers($users)->withImages($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->where('type','default')->count();
        return view('admin.accessories.gallery.create')->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('gallery')) {



            if(!file_exists(storage_path(). '/' . 'app/gallery')){
                \File::makeDirectory(storage_path(). '/' . 'app/gallery');
            }
            $files = $request->file("gallery");
            foreach ($files as $file){
                $gallery = new Gallery();
                $location = storage_path(). '/' . 'app/gallery';
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid('img_').'.'.$extension;
                $file->move($location,$filename);

                $gallery->name = $filename;
                $gallery->save();
                }

            Session::flash('success',"Successfully uploaded files to gallery");
            return redirect()->route('gallery.index');
        }
        else{
            Session::flash('error',"Please select a file");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Gallery::find($id)->delete();

        Session::flash('success',"Successfully deleted file from gallery");
        return redirect()->route('gallery.index');
    }

    public function imagesUrlAction($attribute)
    {
        $path =  storage_path(). '/' . 'app/gallery/' . $attribute;
        if(!\File::exists($path)) abort(400);
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;

    }
}
