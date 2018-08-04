<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use App\Http\Controllers\Controller;
use App\Interested;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('type','default')->count();
        $events = Event::orderBy('id','desc')->paginate(15);

        return view('admin.events.index')->withUsers($users)->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->where('type','default')->count();
        return view('admin.events.create')->withUsers($users);
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
            "location" => "required|max:255",
            "datepicker" => "required"
        ));
        //creating new instance of the post
        $event = new Event();

        $dateTime = Carbon::parse($request->input('datepicker'));


        //grabbing the data into the post object
        $event->title = $request->title;
        $event->info = $request->editor1;
        $event->location = $request->location;
        $event->url = $request->url;
        $event->lat = $request->lat;
        $event->long = $request->long;
        $event->event_date = $dateTime;
        $event->event_time = $request->timepicker;

        //getting image and storing
        if ($request->hasFile('featured_file')){

            if(!file_exists(public_path('../../nkeksi-tech.com/img/events/'))){
                \File::makeDirectory(public_path('img/events/'));
            }

            $image = $request->file('featured_file');

            $location = public_path('../../nkeksi-tech.com/img/events/');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move($location,$filename);
            $event->event_pic = $filename;
        }


        //saving post into the database
        $event->save();

        session()->flash('success', 'Successfully created blog post!');

        Session::flash('success', 'Event was created successfully');
        return redirect()->route('events.show', $event->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all()->where('type','default')->count();
        $event =  Event::find($id);

        return view('admin.events.single')->withUsers($users)->withEvent($event);

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
        $event = Event::Find($id);
//        $this->validate($request, array(
//            'title' => 'required|max:255'
//        ));
        $dateTime = Carbon::parse($request->input('datepicker'));

        //grabbing the data into the post object
        $event->title = $request->title;
        $event->info = $request->editor1;
        $event->location = $request->location;
        $event->url = $request->url;
        $event->lat = $request->lat;
        $event->long = $request->long;
        $event->event_date = $dateTime;
        $event->event_time = $request->timepicker;

        //getting image and storing
        if ($request->hasFile('featured_file')) {
            $image = $request->file('featured_file');

            $location = public_path('../../nkeksi-tech.com/img/events/');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($location, $filename);
            $oldfile = $event->event_pic;
            $event->event_pic = $filename;

            \File::delete('../../nkeksi-tech.com/img/events/'.$oldfile);
        }

        $event->save();
        Session::flash('success', 'Successfully updated event');
        return redirect()->route('events.show', $event->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $oldfile = $event->event_pic;
        $eventId = $event->id;

        \File::delete('img/events/'.$oldfile);

        $event->find($eventId)->interested()->delete();

        $event->delete();
        Session::flash('success', 'Event was successfully deleted');
        return redirect()->route('events.index');
    }

    function createDate($year, $month, $day, $hour, $minute)
    {
        $edate = Carbon::create($year, $month, $day, $hour, $minute, 0, "Africa/Lagos");
        return $edate;
    }
}
