<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('id','desc')->paginate(25);
        $users = User::all()->where('type','default')->count();
        return view('admin.accessories.videos.index')->withUsers($users)->withVideos($videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->where('type','default')->count();
        return view('admin.accessories.videos.create')->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('video')) {


            if(!file_exists(storage_path(). '/' . 'app/gallery')){
                \File::makeDirectory(storage_path(). '/' . 'app/gallery');
            }
            $files = $request->file("video");
            foreach ($files as $file){

                $rules = array(
                    'video' => 'mimes:mp4,mov,ogg,qt | max:20000'
                );
                $validator = \Validator::make(array('video'=> $file), $rules);
                if($validator->passes()) {

                    $video = new Video();
                    $location = storage_path() . '/' . 'app/gallery';
                    $extension = $file->getClientOriginalExtension();
                    $filename = uniqid('vid_') . '.' . $extension;
                    $file->move($location, $filename);

                    $video->name = $filename;
                    $video->save();

                    Session::flash('success',"Successfully uploaded video");
                    return redirect()->route('video.index');
                }else{
                    Session::flash('error',"Only videos are allowed to be uploaded.");
                    return redirect()->back();

                }
            }

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
        //
    }
}
