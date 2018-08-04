<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Session;
use Newsletter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use App\Post;
use App\User;
use App\Team;


class PagesController extends Controller
{

    //handle all request for static pages

    public function getIndex(){

        return view('pages.index');
    }

    // to get the about page
    public function getAbout(){
        $team = Team::orderBy('id','asc')->paginate(4);
        $recentposts = Post::orderBy('id','desc')->paginate(4);
        return view('pages.about')->withRecentposts($recentposts)->withTeam($team);
    }

    // to get the contact page
    public function getContact(){
        $team = Team::orderBy('id','asc')->paginate(4);
        $recentposts = Post::orderBy('id','desc')->paginate(4);
        return view('pages.contact')->withRecentposts($recentposts)->withTeam($team);
    }

    public function getAdminIndex(){
        $users = User::all()->where('type','default')->count();
        return view('admin.index')->withUsers($users);
    }

    public function getAdminLogin(){
        return view('admin.login');
    }

    public function getAdminRegister(){
        return view('admin.register');
    }


    public function subscribeNewsletter(Request $request){
        if (Newsletter::isSubscribed($request->user_email) ) {

            Session::flash('error', "Email already subscribed to this list");
            return Redirect::to(URL::previous() . "#page-footer");

        }
        else{
        Newsletter::subscribe($request->user_email);

            Session::flash('success' , "You have been successfully added to the Nkeksi-Tech Mailing list");
            return Redirect::to(URL::previous() . "#page-footer");
        }

    }


    // to get the contact page
    public function postContact(Request $request){

        $this->validate($request , [
                'email' => 'required|email',
                'subject' => 'min:3',
                'message' => 'min:10'
            ]
            );

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact' , $data , function($message) use ($data){
            $message->from($data['email']);
            $message->to('nkeksi2017@gmail.com');
            $message->subject($data['bodyMessage']);
        });

        Session::flash('success' , "Thanks for contacting us we will get to you shortly");
        return redirect()->to('/contact');
    }

}
