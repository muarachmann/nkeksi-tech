<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Team;
use App\User;
use Illuminate\Support\Facades\Storage;
use Session;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::all();
        $users = User::all()->where('type','default')->count();
        return view('admin.team.index')->withTeam($team)->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->where('type','default')->count();
        return view('admin.team.create')->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Team();

        $fullname     = $request->fullname;
        $email        = $request->email;
        $profession   = $request->profession;
        $site         = $request->site;
        $about      =   $request->editor1;
        $linkedin     = $request->linkedin;
        $twitter      = $request->twitter;
        $facebook     = $request->facebook;
        $google       = $request->google;

        //getting image and storing
        if ($request->hasFile('profile_pic')){

            if(!file_exists(public_path('../../nkeksi-tech.com/img/team/'))){
                \File::makeDirectory(public_path('../../nkeksi-tech.com/img/team/'));
            }

            $image = $request->file('profile_pic');

            $location = public_path('../../nkeksi-tech.com/img/team/');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move($location,$filename);
            $member->profile_pic = $filename;
        }


        // get the member
        $member->fullname = $fullname;
        $member->email = $email;
        $member->profession = $profession;
        $member->site = $site;
        $member->about = $about;
        $member->linkedin = $linkedin;
        $member->google = $google;
        $member->facebook = $facebook;
        $member->twitter = $twitter;


        //saving team member into the database
        $member->save();

        Session::flash('success', 'Successfully created team member');
        return redirect()->route('team.show', $member->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $member = Team::find($id);
       $users = User::all()->where('type','default')->count();

        return view('admin.team.single')->withMember($member)->withUsers($users);
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
        $member = Team::Find($id);
//        $this->validate($request, array(
//            'tag' => 'required|max:255'
//        ));

        $fullname     = $request->fullname;
        $email        = $request->email;
        $profession   = $request->profession;
        $site         = $request->site;
        $about      =   $request->editor1;
        $linkedin     = $request->linkedin;
        $twitter      = $request->twitter;
        $facebook     = $request->facebook;
        $google       = $request->google;

        //getting image and storing
        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');

            $location = public_path('../../nkeksi-tech.com/img/team/');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($location, $filename);
            $oldfile = $member->profile_pic;
            $member->profile_pic = $filename;

            \File::delete('../../nkeksi-tech.com/img/team/'.$oldfile);
        }

        // get the member
        $member->fullname = $fullname;
        $member->email = $email;
        $member->profession = $profession;
        $member->site = $site;
        $member->about = $about;
        $member->linkedin = $linkedin;
        $member->google = $google;
        $member->facebook = $facebook;
        $member->twitter = $twitter;

        $member->save();
        Session::flash('success', 'Successfully updated team member');
        return redirect()->route('team.show', $member->id);
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

    public function imagesUrlAction($attribute)
    {
        $path =  storage_path(). '/' . 'app/team/' . $attribute;
        if(!\File::exists($path)) abort(400);
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;

    }
}
