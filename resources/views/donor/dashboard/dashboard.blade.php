@extends('donor.layouts.app')
@section('panel')
<form action="{{ route('donor_login.donor_update') }}" method="POST" class="cmn-form mt-30 donor_auth_otp_verify" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="form-group col-6">
                <label for="name">@lang('Enter name')</label>
                <input type="text" disabled name="name" class="form-control b-radius--capsule auth_otp_number" id="name" value="{{ old('name', $user->name) }}" placeholder="@lang('Enter name')">
            </div>
            <div class="form-group col-6">
                <label for="mobile_number">@lang('Enter Mobile Number')</label>
                <input type="text" disabled name="mobile_number" class="form-control b-radius--capsule auth_otp_number" id="mobile_number" value="{{ old('mobile_number', $user->phone) }}" placeholder="@lang('Enter Mobile Number')">
            </div>
            <div class="form-group col-6">
                <label for="email">@lang('Email')</label>
                <input type="text" name="email" class="form-control b-radius--capsule" id="email" value="{{ old('email', $user->email) }}" placeholder="@lang('Email')">
            </div>
            <div class="form-group col-6">
                <label for="district">@lang("District")</label>
                <select name="district" class="form-control b-radius--capsule" id="district">
                    
                    <option value="">--select--</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}" data-url="{{ route('donor_login.thana',$city->id )}}" @if($user->city_id == $city->id) selected @endif>{{__($city->name)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="thana">@lang("Thana")</label>
                <select name="thana" class="form-control b-radius--capsule" id="thana">
                    <option value="{{@$thana->id}}">{{@$thana->name}}</option>
                </select>
            </div>
            <div class="form-group col-6">
                <label for="mobile_number">@lang('Facebook Url')</label>
                <input type="text" name="facebook" id="facebook" value="{{$user->socialMedia->facebook}}" placeholder="https://www.facebook.com/" class="form-control b-radius--capsule">
            </div>
            <div class="form-group col-6">
                <label for="district">@lang("Twitter Url")</label>
                <input type="text" name="twitter" id="twitter" value="{{$user->socialMedia->twitter}}" placeholder="https://www.twitter.com/" class="form-control b-radius--capsule">
            </div>
            <div class="form-group col-6">
                <label for="thana">@lang("Instagram Url")</label>
                <input type="text" name="instagram" id="instagram" value="{{$user->socialMedia->instagram}}" placeholder="https://www.instagram.com/" class="form-control b-radius--capsule">
            </div>
            <div class="form-group col-6">
                <label for="thana">@lang("Total Donate")</label>
                <input type="number" name="total_donate" id="donate" value="{{$user->total_donate}}" placeholder="Enter total blood donate" class="form-control b-radius--capsule">
            </div>
            <div class="form-group col-6">
                <label for="thana">@lang("Last Donate")</label>
                <input type="text" name="last_donate" id="last_donate" value="{{Carbon\Carbon::parse($user->last_donate)->format('dd/mm/yyyy')}}" data-language="en" placeholder="Enter Date" onfocus="(this.type='date')" class="form-control b-radius--capsule">
            </div>
            <div class="form-group col-6 d-flex justify-content-center">
                <img src="{{getImage('assets/images/donor/'. $user->image, imagePath()['donor']['size'])}}" alt="{{$user->name}}"
                    style="height: 200px;border-radius: 60%;">
            </div>
            <div class="form-group col-6">
                <label for="file">@lang('Image') <sup class="text--danger"></sup></label>
                <input type="file" id="file" name="image" class="form-control b-radius--capsule">
            </div>
        </div>


    <div class="form-group">
        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Update') <i class="las la-sign-in-alt"></i></button>
    </div>
</form>
@push('script')
    <script>
        $('#district').on('change',function(){
            let value = $(this).val();
            let url = $(this).find(':selected').data('url');

            $.get(url,(res)=>{
                $('#thana').html("");
                $('#thana').html(res);
            })
        })
    </script>
@endpush

@endsection