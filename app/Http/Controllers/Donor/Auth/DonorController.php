<?php

namespace App\Http\Controllers\Donor\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Donor;
use App\Models\DonorAuthOtp;
use App\Models\Location;
use App\Models\User;
use App\Services\SendOtpService;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
{
    use AuthenticatesUsers;
    
    // protected function guard()
    // {
    //     return Auth::guard('donor');
    // }

    public function username()
    {
        return 'phone';
    }
    public function showLoginForm()
    {
        $pageTitle = "Donor Login";
        return view('donor.auth.donor-login', compact('pageTitle'));
    }

    function send_auth_otp(Request $request) {
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

        $notify[] = ['success', 'Otp send to your mobile number'];
        
        return redirect()->route('donor_login.show_otp_verify_form', $request->mobile_number)->withNotify($notify);

    }
    public function showOtpVerifyForm($number)
    {
        $mobile_number = $number;
        $pageTitle = "Otp Verification";
        return view('donor.auth.donor-otp-verify', compact('pageTitle','mobile_number'));
    }
    
    function verifyOtp(Request $request) {
        $auth_otp = DonorAuthOtp::where([['mobile_number', $request->mobile_number],['otp', $request->auth_otp]])->first();

        if(!isset($auth_otp)){
            return response()->json('Otp not found',404);
        }

        $validation_time = Carbon::parse($auth_otp->created_at)->addMinutes(5);

        if($validation_time < now()){
            return response()->json('Otp is expired',403);
        }

        $auth_otp->delete();
        $this->login($request);
    }


    public function login(Request $request) {
        
        // $user = Donor::where('phone', $request->mobile_number)->first();
        $user = User::where('mobile', $request->mobile_number)->first();

        if(!isset($user)){
            return response()->json('Donor not found',404);
        }

        Auth::login($user);

        return response()->json('login successful',200);
    }

    public function message($type, $mobile_number) {
        $random_number = rand(111111, 999999);

        $auth_otp = new DonorAuthOtp();
        $auth_otp->mobile_number = $mobile_number;
        $auth_otp->otp = $random_number;
        $auth_otp->save();

        return "Your Needblood " . $type . " Otp is ". $random_number . ". please don't share this otp to others.
        this otp will be valid for 5 minutes";
    }
    public function dashboard()
    {
        $user = Auth::user()->donor;
        $pageTitle = "Donor Dashboard";
        $thana = Location::find($user->location_id);
        $cities = City::where('status', 1)->get();
        return view('donor.dashboard.dashboard', compact('pageTitle', 'user', 'cities', 'thana'));
    }

    public function logout() {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout Successfully');
    }

    public function donorUpdate(Request $request) {
        // dd($request->all());
        $this->validate($request, [
            'email'=> 'required|email',
            'district'=> 'required|integer',
            'total_donate' => 'required',
            'last_donate' => 'required'
        ]);

        $id = Auth::user()->donor->id;

        $donor = Donor::find($id);
        if($donor->city_id != $request->district){
            $notify[] = ['error', 'Thana is required'];
            return redirect()->back()->withNotify($notify);
        }
        $donor->email = $request->email;
        $donor->city_id = $request->district;
        $donor->location_id = $request->thana;
        $socialMedia = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram
        ];
        $donor->socialMedia = $socialMedia;
        $donor->total_donate = $request->total_donate;
        $donor->last_donate = $request->last_donate;
        $path = imagePath()['donor']['path'];
        $size = imagePath()['donor']['size'];
        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            $donor->image = $filename;
        }
        $donor->save();

        $notify[] = ['success', 'Donor Updated Successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function donor_details() {
        $donor = Auth::user()->donor;

        // return view()
    }

    public function return_thana($id) {
        $thanas = Location::where('city_id', $id)->select('id', 'name')->get();

        $option = "<option value=''>--select--</option>";
        foreach($thanas as $thana){
            $id = $thana->id;
            $name = $thana->name;
            $option .= "<option value=$id>$name</option>";
        }

        return $option;
        
    }

}
