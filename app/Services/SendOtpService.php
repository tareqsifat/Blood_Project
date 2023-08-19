<?php

namespace App\Services;

use App\Models\AuthOtp;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class SendOtpService
{

    function sendAuthOtp(){
        
    }
    function alfa_sms_api($target_number, $message) {
        

        Cookie::queue('mobile_number', $target_number, 10);
        Session::put('mobile_number', $target_number);


        $encoded_msg = urlencode("$message");
        $api_key = getenv('ALFA_SMS_API_KEY');
        
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.sms.net.bd/sendsms?api_key='. $api_key . '&msg=' . $encoded_msg . '&to=88' . $target_number . '',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_HTTPHEADER => array(
        //         'Cookie: PHPSESSID=0ugc0agam2ucebue7k9jdiimdo'
        //     ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
    }
}