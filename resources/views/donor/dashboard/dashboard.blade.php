@extends('donor.layouts.app')
@section('panel')
<form action="{{ route('donor_login.donor_update') }}" method="POST" class="cmn-form mt-30 donor_auth_otp_verify">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">@lang('Enter name')</label>
                    <input type="text" name="name" class="form-control b-radius--capsule auth_otp_number" id="name" value="{{ old('name', $user->name) }}" placeholder="@lang('Enter name')">
                </div>
                <div class="form-group">
                    <label for="email">@lang('Email')</label>
                    <input type="text" name="email" class="form-control b-radius--capsule" id="email" value="{{ old('email', $user->email) }}" placeholder="@lang('Email')">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="mobile_number">@lang('Enter Mobile Number')</label>
                    <input type="text" name="mobile_number" class="form-control b-radius--capsule auth_otp_number" id="mobile_number" value="{{ old('mobile_number', $user->phone) }}" placeholder="@lang('Enter Mobile Number')">
                </div>
                <div class="form-group">
                    <label for="district">@lang("District")</label>
                    <select name="district" class="form-control b-radius--capsule" id="district">
                        
                        <option value="">--select--</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($user->city_id == $city->id) selected @endif>{{__($city->name)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Login') <i class="las la-sign-in-alt"></i></button>
    </div>
</form>
@endsection