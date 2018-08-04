<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Post;
use App\Team;

class TeamController extends Controller
{
    public function getTeam(){
        $team = Team::orderBy('id','asc')->paginate(4);
        $recentposts = Post::orderBy('id','desc')->paginate(4);
        return view('team.index')->withRecentposts($recentposts)->withTeam($team);
    }

    public function getMember($member_id){
        $team = Team::orderBy('id','asc')->paginate(4);
        $member = Team::find($member_id);
        $recentposts = Post::orderBy('id','desc')->paginate(4);
        return view('team.single')->withMember($member)->withTeam($team)->withRecentposts($recentposts);
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
