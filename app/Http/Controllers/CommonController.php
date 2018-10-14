<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use Illuminate\Support\Facades\Input;
use App\Model\Review;
use Auth;
use App\Otp\SmsOtp;
use Session;
use App\User;

class CommonController extends FrontController
{
    public function getState(Request $request)
    {
      $states=State::select('id','name')->where('country_id',$request->country_id)->orderBy('name', 'asc')->get();
      return response()->json($states);
        
    }

    public function getCity(Request $request)
    {
      
        $cities=City::select('id','name')->where('state_id',$request->state_id)->orderBy('name', 'asc')->get();
        return response()->json($cities);
    }

    public function searchCity(Request $request)
    {
       $suggestions = [];
       $query = Input::get('query');
        if(strlen($query) > 0)
        {
          $cities= City::where('name', 'LIKE', $query . '%')->orderBy('name')->get(['id as data', 'name as value'])->take(10)->toArray();
          if (!is_null($cities)) { $suggestions = $cities; }
        }
      $result = ['query'=>$query,'suggestions'=>$suggestions];
      return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
    }

   // reviews 
    public function reviews(Request $request)
    {
      $this->validate($request,['comment'=>'required|max:1000', 'rating'=>'required']);

      Review::create([
        'company_id'=>$request->company_id,
        'user_id'=>Auth::user()->id,
        'comment'=>$request->comment,
        'rating'=>$request->rating
      ]);

    return redirect()->back()->with('message', 'Review successfully submited. your comment approved by admin');
    }

    public function change_password(Request $request)
    {
      return view('change_password');
    }

    public function change_password_otp(Request $request)
    {
        $this->validate($request, ['password'=>'required|alpha_num|min:8|confirmed']);

        $otp=rand(1000,9999);

        $sms=new SmsOtp();
        $sms->verifyOtp(Auth::user()->mobile,$otp);
        $motp=array('user_id'=>Auth::user()->id,'mobile'=>Auth::user()->mobile,'otp'=>$otp,'password'=>$request->password);
        Session::put('mobile_otp', $motp);
      
      return redirect('change_password_otp_from');
    }

    public function change_password_otp_from(Request $request)
    {
      return view('change_password_otp');
    }


    public function change_password_submit(Request $request)
    {
      if(Session::has('mobile_otp'))
        {
          $this->validate($request, ['otp' => 'required|digits:4']);
          $mobile_otp=Session::get('mobile_otp');
     
         if($mobile_otp['otp']==$request->otp)
         {
            $newpassword = bcrypt($mobile_otp['password']);
            $user=User::find(Auth::user()->id);
            $user->password=$newpassword;
            $user->save();
            Session::forget('mobile_otp');
            return  redirect('change_password')->with('message','Successfully change your password.');
         }else
         {
            return redirect()->back()->with('message','Invalid OTP please try again');
         }
      }
    }

}


