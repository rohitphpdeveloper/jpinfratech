<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Helper;
use App\Model\Resolution;
use App\Model\Resolution_question;
use App\Model\Result;
use App\Model\Enquiry;
use App\Model\Resolution_category;
use App\Model\Resolution_log;
use Mail;



class EventController extends FrontController

{

  

   //voting



     public function thank_you()

   {

       return view('thankyou');

   }



   public function profile()

   {

      $user=User::where(['id'=>Auth::user()->id,'backup'=>0])->first();

      return view('profile',compact('user'));

   }

   public function enquiry()

   {

      $user=User::where(['id'=>Auth::user()->id,'backup'=>0])->first();

      $enquires=Enquiry::where(['user_id'=>Auth::user()->id,'backup'=>0])->get();

      return view('enquiry',compact('enquires','user'));

   }



    //Event list

   public function event()

   {

      $user=User::where(['id'=>Auth::user()->id,'backup'=>0])->first();

       $resolution=Resolution::select('resolutions.event_id','resolutions.id','resolutions.agenda','resolutions.startdate','resolutions.enddate','resolutions.start_time','resolutions.end_time','resolutions.resolutionfile','resolutions.status')->where(['resolutions.backup'=>0,'resolutions.status'=>'active','resolution_category.category_id'=>$user->user_type])

       ->Join('resolution_category', 'resolutions.id', '=', 'resolution_category.resolution_id')

       ->get();

       return view('eventlist',compact('resolution'));

   }



   //voting

   public function voting($id)

   {

      $resolution=Resolution::where(['status'=>'active','id'=>$id,'backup'=>0])->first();

      $vote=Resolution_question::where(['status'=>'active','resolution_id'=>$id,'backup'=>0])->get();

    

      return view('votinglist',compact('vote','resolution'));

   }



     //thankyou

    public function thankyou(Request $request)

    { 

    $user=User::where(['id'=>Auth::user()->id,'backup'=>0])->first();;

    Result::where('user_id',Auth::user()->id)->where('resolution_id',$request->resolution_id)->delete();

    $i=0;

    foreach ($request->question_id as $qid)

            {

             if($request->answer[$i]==1){

              $answer1=1;

              $answer2=0;

              $answer3=0;

             }

             if($request->answer[$i]==2){

              $answer1=0;

              $answer2=1;

              $answer3=0;

             }

              if($request->answer[$i]==3){

              $answer1=0;

              $answer2=0;

              $answer3=1;

             }

              Result::Create([

                'user_id'=>Auth::user()->id,

                'category_id'=>$user->user_type,

                'resolution_id'=>$request->resolution_id,

                'question_id'=>$qid,

                'option_1'=>$answer1,

                'option_2'=>$answer2,

                'option_3'=>$answer3

                ]);

              $i++;

            }



         $client_ip=$_SERVER['REMOTE_ADDR'];

         $browser_property=$_SERVER['HTTP_USER_AGENT'];

         $mac='';

         system('ipconfig /all'); //Execute external program to display output

         $mycom=ob_get_contents(); // Capture the output into a variable

         //ob_clean(); // Clean (erase) the output buffer

         $findme = "Physical";

         $pmac = strpos($mycom, $findme); // Find the position of Physical text

         $mac=substr($mycom,($pmac+36),17); // Get Physical Address

         Resolution_log::where('user_id',Auth::user()->id)->where('resolution_id',$request->resolution_id)->delete();

         Resolution_log::Create([

           'user_id'=>Auth::user()->id,

           'resolution_id'=>$request->resolution_id,

           'client_ip'=>$client_ip,

           'mac_address'=>$mac,

           'browser_property'=>$browser_property

         ]);


         if($user->user_type==1){
          $emaifrom = 'ar.fdholders@jaypeeinfratechar.in';
         }elseif($user->user_type==2){
          $emaifrom = 'ar.homebuyers@jaypeeinfratechar.in';
         }
          
           $data=array();
           $from=array();
           $data['name']=$user->name;
           $data['email']=$user->email;
           $from['address']=$emaifrom;
           $from['name']='Evoting';
           $from['email_to']=$user->email;
           Mail::send('emails.welcome', $data, function ($message) use ($from) {
           $message->from($from['address'], $from['name']);
           $message->to($from['email_to']);
           $message->subject('Evoting:Thankyou');
           });

      
      return redirect('thank_you')->with('success','“Thank you for casting your vote. You can change your voting preference before the voting lines are closed.”');

    }



    public function userenquiry(Request $request)

    {

    $user=User::where(['id'=>Auth::user()->id,'backup'=>0])->first();

     Enquiry::Create([

              'user_id'=>Auth::user()->id,

              'category_id'=>$user->user_type,

              'question'=>$request->question

              ]);

        return redirect('enquiry')->with('success','Your Query Send Successfully');

    }

  }

