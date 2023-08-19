@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper default-version">
        <div class="form-area bg_img" data-background="{{asset('assets/admin/images/1.jpg')}}">
            <div class="form-wrapper">
                <h4 class="logo-text mb-15">@lang('Welcome to') <strong>{{__($general->sitename)}}</strong></h4>
                <p>{{__($pageTitle)}} @lang('to')  {{__($general->sitename)}} @lang('dashboard')</p>
                <form action="{{ route('donor_login.send_auth_otp') }}" method="POST" class="cmn-form mt-30">
                    @csrf
                    <div class="form-group">
                        <label for="email">@lang('Enter Mobile Number')</label>
                        <input type="text" name="mobile_number" class="form-control b-radius--capsule send_auth_otp_number" id="username" value="{{ old('mobile_number') }}" placeholder="@lang('Enter Mobile Number')">
                        <i class="las la-user input-icon"></i>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Login') <i class="las la-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
        </div><!-- login-area end -->
    </div>
    <script>
        let number = $('.send_auth_otp_number').val();

        localStorage.setItem('mobile_number', number);
    </script>
@endsection