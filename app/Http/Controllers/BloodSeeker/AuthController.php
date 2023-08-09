<?php

namespace App\Http\Controllers\BloodSeeker;

use App\Http\Controllers\Controller;
use App\Models\AuthOtp;
use App\Models\User;
use App\Services\SendOtpService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {

        $user = User::where('mobile', $request->mobile_number)->first();

        if(!isset($user)){
            return response()->json('user not found',404);
        }

        Auth::login($user);

        return response()->json('login successful',200);
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'mobile_number' => 'required|regex:/^01[0-9]{9}$/'
        ]);
        $user = User::firstOrNew(['mobile' => $request->mobile_number]);
        $user->name = $request->name;
        $user->save();

        
        $send_otp_service = new SendOtpService();
        $send_otp_service->alfa_sms_api($request->mobile_number, $this->message('registration',$request->mobile_number));

        return response()->json('register successful',200);
    }
    

    function send_auth_otp(Request $request) {
        $this->validate($request, [
            'mobile_number' => 'required|regex:/^01[0-9]{9}$/'
        ]);


        $user = User::where('mobile', $request->mobile_number)->first();

        if(!$user){
            return response()->json([
                "message" => "User not found"
            ],404);
        }


        $send_otp_service = new SendOtpService();
        $send_otp_service->alfa_sms_api($request->mobile_number, $this->message('login',$request->mobile_number));

        return response()->json([
            "message" => "Otp sent successfully"
        ],200);

    }
    
    function validateOtp(Request $request) {
        $auth_otp = AuthOtp::where([['mobile_number', $request->mobile_number],['otp', $request->otp]])->first();


        if(!isset($auth_otp)){
            return response()->json([
                "Message" => "Otp not Found"
            ], 404);
        }

        $validation_time = Carbon::parse($auth_otp->created_at)->addMinutes(5);
        if($validation_time < now()){
            return response()->json([
                "Message" => "Otp is expired"
            ], 403);
        }
        $auth_otp->delete();
        $this->login($request);
    }

    public function logout() {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        Auth::logout();
        return redirect()->back()->with('success', 'Logout successful');
    }

    public function message($type, $mobile_number) {
        $random_number = rand(111111, 999999);

        $auth_otp = new AuthOtp();
        $auth_otp->mobile_number = $mobile_number;
        $auth_otp->otp = $random_number;
        $auth_otp->save();

        return "Your Needblood " . $type . " Otp is ". $random_number . ". please don't share this otp to others.
        this otp will be valid for 5 minutes";
    }
}
