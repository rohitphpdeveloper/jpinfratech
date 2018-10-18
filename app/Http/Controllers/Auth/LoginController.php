<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Otp\SmsOtp;
use Validator;
use Mail;
use Auth;
class LoginController extends FrontController
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
         parent::__construct();
    }

    public function authenticate($user)
    {
        return redirect()->intended($this->redirectPath());
    }

    public function username()
    {
        return 'fd_no';
    }



   public function login(Request $request)
    {

        $this->validate($request, [
            'fd_no' => 'required', 'password' => 'required',
        ]);

        $votingshare=User::select('voting_share')->where('fd_no',$request->fd_no)->first();

       if($votingshare->voting_share==0){
            return redirect()->back()->with('message', 'You are not eligible to vote as you have already voted for the last resolution');
       }else{
             $credentials = array('fd_no' => $request->fd_no, 'password' =>$request->password,'user_type'=>1);
       }


        if (Auth::attempt($credentials)) {
            // Authentication passed...
           return redirect()->intended('home');

        } else {
            return redirect()->back()->with('message', 'Your Fd Number/password combination was incorrect ');
        }


    }

    public function hblogin(Request $request)
    {

        $this->validate($request, [
            'fd_no' => 'required', 'password' => 'required',
        ]);

        $votingshare=User::select('voting_share')->where('fd_no',$request->fd_no)->first();

        if($votingshare->voting_share==0){
            return redirect()->back()->with('message', 'You are not eligible to vote as you have already voted for the last resolution');
           }else{
                 $credentials = array('fd_no'=>$request->fd_no,'password'=>$request->password,'user_type'=>2);
           }

        if (Auth::attempt($credentials)) {
            // Authentication passed...
           return redirect()->intended('home');
           
        } else {
            return redirect()->back()->with('message', 'Your Unit Number/password combination was incorrect ');
        }


    }



    public function login_otp_send(Request $request)
    { 
        $this->validate($request, ['fd_no' => 'required|min:5','loginType' =>'required']);

        $user=User::where('fd_no',$request->fd_no)->first();

        $mobilemsg = Str::substr($user->mobile, -4);
        $emailmsg = Str::substr($user->email, 0,5).'xxxxxxxx'. strstr($user->email, "@");
      
        if(!empty($user))
        {
            $otp=rand(1000,9999);
        
            $sms=new SmsOtp();
            $sms->verifyOtp($user->mobile,$otp);
            $motp=array('user_id'=>$user->id,'mobile'=>$user->mobile,'otp'=>$otp);
            Session::put('mobile_otp', $motp);

            $data=array();
            $from=array();
            $data['name']=$user->name;
            $data['email']=$user->email;
            $data['otp']=$otp;
            $from['address']='ar.fdholders@jaypeeinfratechar.in';
            $from['name']='Evoting Otp';
            $from['email_to']=$user->email;
            Mail::send('emails.otp', $data, function ($message) use ($from) {
            $message->from($from['address'], $from['name']);
            $message->to($from['email_to']);
            $message->subject('Evoting:Thankyou');
             });
            return  redirect('login_otp')->with('message','OTP send in your register Mobile no '.'xxxxxx'.$mobilemsg. ' and Email Id ' .$emailmsg);
        }else{
            return redirect()->back()->with('message','Invalid Number');
        }

    }

    public function login_otp(Request $request)
    {
        if(Session::has('mobile_otp'))
        {
            return view('auth.login_otp');
        }else{
            return  redirect('login_otp');
        }
        
    }

    public function verifed_login_otp(Request $request)
    {
        if(Session::has('mobile_otp'))
        {

         $this->validate($request, ['otp' => 'required|digits:4', 'password' => 'required|string|min:8|confirmed']);
         $mobile_otp=Session::get('mobile_otp');
     
         if($mobile_otp['otp']==$request->otp)
         {
            $newpassword = bcrypt($request->password);
            $user=User::find($mobile_otp['user_id']);
            $user->password=$newpassword;
            $user->save();
           
            $votingshare=User::select('user_type')->where('id',$mobile_otp['user_id'])->first();

            if($votingshare->user_type==1){
               Session::forget('mobile_otp');
                return  redirect('login')->with('message','Successfully change your password please login');
            }elseif($votingshare->user_type==2){
               Session::forget('mobile_otp');
              return  redirect('login_buyers')->with('message','Successfully change your password please login');
            }
         
            
         }else
         {
            return redirect()->back()->with('message','Invalid OTP please try again');
         }
      }else{
        return  redirect('login');
      }


    }

    public function login_buyers()
    {
      return view('auth/login_buyer');
    }

}
