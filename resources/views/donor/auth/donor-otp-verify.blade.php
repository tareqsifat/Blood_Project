@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper default-version">
        <div class="form-area bg_img" data-background="{{asset('assets/admin/images/1.jpg')}}">
            <div class="form-wrapper">
                <h4 class="logo-text mb-15">@lang('Welcome to') <strong>{{__($general->sitename)}}</strong></h4>
                <p>{{__($pageTitle)}} @lang('to')  {{__($general->sitename)}} @lang('dashboard')</p>
                <form action="{{ route('donor_login.verify_otp') }}" method="POST" class="cmn-form mt-30 donor_auth_otp_verify">
                    @csrf
                    <input type="hidden" name="mobile_number" value="{{ $mobile_number }}">
                    <div class="form-group">
                        <label for="auth_otp">@lang('Enter Otp')</label>
                        <input type="text" name="auth_otp" class="form-control b-radius--capsule" id="auth_otp" value="{{ old('auth_otp') }}" placeholder="@lang('Enter Otp')">
                        <i class="las la-user input-icon"></i>
                        <p class="text-danger otp_expired d-none">@lang('Otp Expired')</p>
                        <p class="text-danger otp_not_found d-none">@lang('Opt Not Found')</p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Login') <i class="las la-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
        </div><!-- login-area end -->
    </div>

<!-- jQuery library -->
<script src="{{asset('assets/admin/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script>
        number = localStorage.getItem('mobile_number'); 
        console.log('mobile_number', number);
        $('.auth_otp_number').val(localStorage.getItem('mobile_number'));

        $('.donor_auth_otp_verify').on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            baseUrl = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '')

            url = baseUrl + '/BloodMessage/donor_login/donor_dashboard';


            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                cache: false, // To prevent caching
                processData: false, // To prevent automatic processing of formData
                contentType: false, // To prevent setting the content type
                success: (res) => {
                    window.location.href = url;
                },
                error: (err) => {
                    if(err.status == 403){
                        $('.otp_expired').removeClass('d-none')
                    }
                    if(err.status == 404){
                        $('.otp_not_found').removeClass('d-none')
                    }
                }
            });
        });
    </script>
@endsection