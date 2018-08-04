<?php

namespace App\Http\Controllers;

use App\Post;
use App\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::orderBy('id','desc')->paginate(4);
        $recentposts = Post::orderBy('id','desc')->paginate(4);
        return view('dashboard')->withRecentposts($recentposts)->withTeam($team);
    }

    public function updateProfile(Request $request){
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:4',
            'phone' => 'required',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');

            $location = public_path('img/users/');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($location, $filename);
            $oldfile = $user->avatar;
            $user->avatar = $filename;

            \File::delete('img/users/'.$oldfile);
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->about = $request->about;
        $user->save();

        Session::flash('success','Profile successfully updated');
        return redirect()->back();
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            Session::flash("error","Your current password does not matches with the password you provided. Please try again.");
            return Redirect::to(URL::previous() . "#tab-change-password");
        }

        if(strcmp($request->get('current-password'), $request->get('password')) == 0){
            //Current password and new password are same
            Session::flash("error","New Password cannot be same as your current password. Please choose a different password.");
            return Redirect::to(URL::previous() . "#tab-change-password");

        }

        if(strcmp($request->get('password'), $request->get('password-confirm')) != 0){
            //Current password and new password are same
            Session::flash("error","Your password confirmation password doesn't match the one you entered");
            return Redirect::to(URL::previous() . "#tab-change-password");

        }

        $request->validate([
            'password' => 'required|min:6',
            'password-confirm' => 'required|string|min:6',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        Session::flash("success","Password successfully changed!");
        return Redirect::to(URL::previous() . "#tab-change-password");

    }
}
