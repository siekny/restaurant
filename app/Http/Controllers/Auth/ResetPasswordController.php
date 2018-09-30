<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Http\Request;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

//show form reset
    public function showResetForm(Request $request, $token = null)
    {
        return view('email.reset')->with(
            ['token' => $token, 'email' => $request->get('email')]
        );

    }

    //for update reset password we need to add field reset_password in db

    public function reset(Request $request)
    {

        $this->validate($request, [
            'password'=>'required|min:6',
            'password_Confirm'=>'required|same:password',

        ]);
        $reset_password=$request->reset_password;
        $password=$request->password;
        $user=User::where('reset_password',$reset_password)->first();
        if(!empty($user)){
            $user->password=bcrypt($password);
            $user->reset_password="";
            $user->save();
            return redirect()->route('login');
        }
        return view('administrator.expire');
    }
}
