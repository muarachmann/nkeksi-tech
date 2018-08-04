<?php

namespace App\Http\Controllers;

use App\Interested;
use Illuminate\Http\Request;
use App\Team;
use App\Post;
use App\Event;
use App\Comment;

class EventController extends Controller
{
    public function index()
    {
        $team = Team::orderBy('id','desc')->paginate(4);
        $recentposts = Post::orderBy('id','desc')->paginate(4);
        $events = Event::orderBy('id','desc')->paginate(10);
        return view('events.index')->withEvents($events)->withRecentposts($recentposts)->withTeam($team);
    }

    public function show($id)
    {
        //show a single post
        $event = Event::find($id);
        $team = Team::orderBy('id','desc')->paginate(4);
        $recentposts = Post::orderBy('id','desc')->paginate(4);
        $comments = Comment::find($id);
        $next = Event::where('id', '>', $event->id)->first();
        $previous = Event::where('id', '<', $event->id)->first();
        return view('events.single')->withEvent($event)->withRecentposts($recentposts)->withTeam($team)->withComments($comments)->withNext($next)->withPrevious($previous);
    }

    public function eventInterest(Request $request){
        $eventId = $request->eventId;
        $event = Event::Find($eventId);
        $isGoing = true;
        $update = false;

        $user = \Auth::user();


        $userGoing = $user->interested->where('event_id',$eventId)->first();

        if($userGoing){
            $alreadyLike = $userGoing->interested;
            $update = true;
            if($alreadyLike == true){
                $isGoing = false;
            }else{

            }

        }else{
            //i dont have a like for this event
            $userGoing = new Interested();
        }

        $userGoing->interested = $isGoing;
        $userGoing->user_id = $user->id;
        $userGoing->event_id = $event->id;

        if($update){
            $userGoing->update();
        }
        else{
            $userGoing->save();
        }

        $userGoing->total = $event->interested->where('interested', 1)->count();

        //return whether like or dislike
        return $userGoing;

    }
}
