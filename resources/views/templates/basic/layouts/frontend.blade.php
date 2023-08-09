
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5EV48QHNWE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5EV48QHNWE');
</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $general->sitename(__($pageTitle)) }}</title>
  @include('partials.seo')
  <link rel="icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" sizes="16x16">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/line-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lightcase.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/slick.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/main.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/preloader.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}">
  
  {{-- <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/bootstrap.min.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/all.min.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/line-awesome.min.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lightcase.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/slick.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/main.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/preloader.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}" media="print" onload="this.media='all'; this.onload=null;"> --}}
  @stack('style-lib')
  @stack('style')
  <link href="{{ asset($activeTemplateTrue . 'frontend/css/color.php') }}?color={{$general->base_color}}&secondColor={{$general->secondary_color}}" rel="stylesheet"/>
</head>
    <body>
        @stack('fbComment')
        <div class="scroll-to-top">
            <span class="scroll-icon">
                <i class="las la-arrow-up"></i>
            </span>
        </div>
       <div class="preloader-holder">
              <div class="preloader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </div>
        </div>
        @include($activeTemplate . 'partials.header')
        <div class="main-wrapper">
            @yield('content')
        </div>
        @include($activeTemplate . 'partials.footer')
        <script src="{{asset($activeTemplateTrue.'frontend/js/lib/jquery-3.6.0.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.1.5/lazysizes.min.js"></script>
        <script defer src="{{asset($activeTemplateTrue.'frontend/js/lib/bootstrap.bundle.min.js')}}"></script>
        <script defer src="{{asset($activeTemplateTrue.'frontend/js/lib/slick.min.js')}}"></script>
        <script defer src="{{asset($activeTemplateTrue.'frontend/js/lib/wow.min.js')}}"></script>
        <script defer src="{{asset($activeTemplateTrue.'frontend/js/lib/lightcase.js')}}"></script>
        <script defer src="{{asset($activeTemplateTrue.'frontend/js/app.js')}}"></script>
        <script defer src="{{asset($activeTemplateTrue.'frontend/js/preloader.js')}}"></script>
        <script defer src="{{asset($activeTemplateTrue.'frontend/js/custom.js')}}"></script>
        @stack('script-lib')
        @stack('script')
        @include('partials.plugins')
        @include('partials.notify')
        <script>
            (function ($) {
                "use strict";
                $(".langSel").on("change", function() {
                    window.location.href = "{{route('home')}}/change/"+$(this).val() ;
                });
            })(jQuery);
        </script>
        <div class="modal fade" id="sendAuthModal" tabindex="-1" aria-labelledby="sendAuthModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content custom--card section--bg2 form-holder" >
                    <form method="POST" action="{{route('blood-seeker.send_auth_otp')}}" class="login_register_form contact-donor-form">
                        @csrf
                        <div class="modal-header" style="padding: 0.9981rem 1.2rem">
                            <h5 class="text-white">@lang('login')</h5>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="text-white" for="mobile_number">@lang('Enter Mobile Number')</label>
                                    <input type="text" name="mobile_number" value="{{old('mobile_number')}}" class="form--control form-control-md send_auth_otp_number" placeholder="@lang('Enter Mobile Number')" maxlength="80" required>
                                    <p class="text-danger invalid_number d-none">@lang('not a valid bangladeshi mobile number')</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary registration_modal_call" data-bs-dismiss="modal" style="background-color: #ffffff26">@lang('registration')</button>
                            <button type="submit" class="btn btn-primary">@lang('login')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content custom--card section--bg2 form-holder" >
                    <form method="POST" action="{{route('blood-seeker.register')}}" class="register_form contact-donor-form">
                        @csrf
                        <div class="modal-header" style="padding: 0.9981rem 1.2rem">
                            <h5 class="text-white">@lang('register')</h5>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <p class="text-white pb-2">@lang('user not found please provide name and mobile number for register')</p>
                                <div class="form-group">
                                    <label class="text-white" for="mobile_number">@lang('Enter Mobile Number')</label>
                                    <input type="text" name="mobile_number" value="{{old('mobile_number')}}" class="form--control form-control-md register_modal_number" placeholder="@lang('Enter Mobile Number')" maxlength="80" required>
                                    <p class="text-danger invalid_number d-none">@lang('not a valid bangladeshi mobile number')</p>
                                </div>
                                <div class="form-group">
                                    <label class="text-white" for="name">@lang('Enter Your Name')</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form--control form-control-md" placeholder="@lang('Enter Mobile Name')" maxlength="80" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">@lang('register')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="verifyOtpModal" tabindex="-1" aria-labelledby="verifyOtpLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content custom--card section--bg2 form-holder" >
                    <form method="POST" action="{{route('blood-seeker.validate_otp')}}" class="verify_otp_form contact-donor-form">
                        @csrf
                        <div class="modal-header" style="padding: 0.9981rem 1.2rem">
                            <h5 class="text-white">@lang('Enter Otp')</h5>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    {{-- {{session()->has('mobile_number') ? session()->get('mobile_number') : request()->cookie('mobile_number')}} --}}
                                    <label class="text-white" for="mobile_number">@lang('mobile number')</label>
                                    <input type="text" class="form--control form-control-md verify_otp_mobile" name="mobile_number" value="" placeholder="@lang('mobile number')">
                                    <label class="text-white" for="mobile_number">@lang('Enter Otp')</label>
                                    <input type="number" autocomplete="on" name="otp" value="{{old('otp')}}" class="form--control form-control-md" placeholder="@lang('Enter Otp')" maxlength="80" required>
                                    <p class="text-danger otp_expired d-none">@lang('Otp Expired')</p>
                                    <p class="text-danger otp_not_found d-none">@lang('Opt Not Found')</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">@lang('confirm')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
