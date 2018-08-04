<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

use App\User;
use Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

      /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)

    {
        $socialuser = Socialite::driver($service)->user();
        $user = new User();  
        $findUser = User::where('email',$socialuser->email)->first();

        if($findUser){
             Auth::login($findUser);
             Session::flash('success', "Successfully logged in user");
             return redirect()->route('dashboard');
        }
        else{
                //register the user
              
            $user->name = $socialuser->name;
            $user->email = $socialuser->email;
            $user->password = bcrypt('');


            if ($socialuser->getAvatar()) {
                if(!file_exists(public_path('img/users/'))){
                    \File::makeDirectory(public_path('img/users/'));
                }
                $filename = time().".jpg";
                $location = public_path('img/users/');
                $user->avatar = $filename;
                // The filename to save in the database.
                file_put_contents(
                    $location.$filename,
                    file_get_contents($socialuser->getAvatar())
                );
            }


            $user->save();
             Session::flash('success', "Successfully registered in user");
             Auth::login($user);
             return redirect()->route('dashboard');

        }

        
    }

    protected function authenticated($request, $user)
    {
        if(Auth::user() && Auth::user()->isAdmin()) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->intended('/dashboard');
    }


    /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), 3, 10
        );
    }


}
