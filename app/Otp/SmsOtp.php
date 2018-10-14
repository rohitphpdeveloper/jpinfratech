<?php
namespace App\Otp;
use Session;
class SmsOtp 
{

    public $user;
    private $smsUrl ='https://www.smsgateway.center/SMSApi/rest/send?userId=&password=&senderId=SMSGAT&sendMethod=simpleMsg&msgType=TEXT&msg=';

  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    
    public function verifyOtp($mobile,$otp)
    {
        //$message=urlencode("Your verification code is $otp"); 
        $message=urlencode("$otp as Your Login OTP for Jaypee Infratech. Please do not share this with any one Regards, Jaypee Infratech Ltd");
       
        $ch=curl_init("https://www.smsgateway.center/SMSApi/rest/send?userId=suyash123&password=Suyash@123&senderId=JAYPEE&sendMethod=simpleMsg&msgType=TEXT&msg=$message&mobile=$mobile&duplicateCheck=true&format=json"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responsech = curl_exec($ch);
        curl_close($ch);
        //echo $responsech;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verifyUser');
    }
}