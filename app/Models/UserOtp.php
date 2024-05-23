<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Twilio\Rest\Client;
use URL;

class UserOtp extends Model
{
    use HasFactory;

    
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = ['user_id', 'otp', 'expire_at'];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendSMS($receiverNumber)
    {
        $message = "Login OTP is ".$this->otp;
    
        try {
  
           /* $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
            */

            $account_sid = config('app.TWILIO_SID');
            $auth_token = config('app.TWILIO_TOKEN');
            $twilio_number = config('app.TWILIO_FROM');


            \Log::info('SMS Sent Successfully in mobile.');
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
            \Log::info('SMS Sent Successfully in mobile.');
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

    public function sendForgetPasswordLink($receiverNumber){
        
        $message = "Here forget password otp ".$this->otp;

        try {

            $account_sid = config('app.TWILIO_SID');
            $auth_token = config('app.TWILIO_TOKEN');
            $twilio_number = config('app.TWILIO_FROM');

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
        
    }


    public function sendOTPinWhatsapp($receiverNumber)
    {
        $message = "Login OTP is ".$this->otp;
    
        try {

  
            $accountSid = config('app.TWILIO_SID');
            $authToken = config('app.TWILIO_TOKEN');
            $whatsappnumber = config('app.TWILIO_FROM_WHATSAPP');


            $twilio = new Client($accountSid, $authToken);
            $message = $twilio->messages->create("whatsapp:".$receiverNumber,[
                   "from" => $whatsappnumber,
                   "body" => $message,
                ]);
            \Log::info('SMS Sent Successfully in whatsapp.');
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

}
