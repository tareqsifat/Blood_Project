<?php

namespace App\Http\Controllers\Donor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Services\SendOtpService;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function showLoginForm()
    {
        $pageTitle = "Donor Login";
        return view('donor.auth.donor-login', compact('pageTitle'));
    }

    function send_auth_otp(Request $request) {
        dd($request->all());
        $this->validate($request, [
            'mobile_number' => 'required|regex:/^01[0-9]{9}$/'
        ]);


        $donor = Donor::where('phone', $request->mobile_number)->first();

        if(!$donor){
            $notify[] = ['error', 'Donor not found'];
            return redirect()->back()->withNotify($notify);
        }


        $send_otp_service = new SendOtpService();
        $send_otp_service->alfa_sms_api($request->mobile_number, $this->message('login',$request->mobile_number));

        return response()->json([
            "message" => "Otp sent successfully"
        ],200);

    }

    public function login(Request $request) {
        $this->validate($request,[
            'mobile_number' => 'required|regex:/^01[0-9]{9}$/'
        ]);

        $donor = Donor::where('phone', $request->mobile_number)->first();

    }
}
