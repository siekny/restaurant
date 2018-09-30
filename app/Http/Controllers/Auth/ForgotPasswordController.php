<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\LarashopAdminResetPassword;

use Illuminate\Http\Request;
use App\User;
use Mail;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        
        $this->middleware('guest');
    }

    //sent email 

    public function sendResetLinkEmail(Request $request){
        $name=$request->email;
        $email=$name;
        $verification_code = str_random(30);
        $user=User::where('email',$email)->first();
        if(empty($user)){
            return redirect()->back()->with('message','The email is incorrect !');
        }
        $user->reset_password   =$verification_code;
        $user->save();
        $subject = "Please verify your email address.";
            Mail::send('email.verify', ['name' => $name, 'verification_code' => $verification_code],
                function ($mail) use ($email, $name, $subject) {
                    $mail->from(getenv('FROM_EMAIL_ADDRESS'), "internalproject.planb@gmail.com");
                    $mail->to($email, $name);
                    $mail->subject($subject);
            });

            return view('email.email_message');
    }



}
