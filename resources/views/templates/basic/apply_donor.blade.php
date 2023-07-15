@extends($activeTemplate.'layouts.frontend')
@section('content')
@include($activeTemplate . 'partials.breadcrumb')
<section class="pt-100 pb-100 position-relative z-index section--bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{route('apply.donor.store')}}" class="contact-form bg-white p-sm-5 p-3 rounded-3 position-relative" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-3">@lang('Personal Information')</h5>
                    <div class="row mb-4">
                        <div class="form-group col-lg-6">
                            <label for="name">@lang('Name') <sup class="text--danger">*</sup></label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="@lang('Full name')" class="form--control" maxlength="80" required="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">@lang('Email') <sup class="text--danger">*</sup></label>
                            <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="@lang('Enter Email')" class="form--control" maxlength="60" required="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="phone">@lang('Phone') <sup class="text--danger">*</sup></label>
                            <input type="text" name="phone" id="phone" value="{{old('phone')}}" placeholder="@lang('Enter Phone')" class="form--control" maxlength="40" required="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="city">@lang('City') <sup class="text--danger">*</sup></label>
                            <select name="city" id="city" class="select" required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" data-locations="{{json_encode($city->location)}}">{{__($city->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="location">@lang('Location') <sup class="text--danger">*</sup></label>
                            <select name="location" id="location" class="select" required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                            </select>
                        </div>
                        <!--<div class="form-group col-lg-6">-->
                        <!--    <label for="address">@lang('Address') <sup class="text--danger">*</sup></label>-->
                        <!--    <input type="text" name="address" id="address" value="{{old('address')}}" placeholder="@lang('Enter Address')" class="form--control" maxlength="255" required="">-->
                        <!--</div>-->
                         <div class="form-group col-lg-6">
                            <label for="file">@lang('Image') <sup class="text--danger"></sup></label>
                            <input type="file" id="file" name="image" class="form--control custom-file-upload">
                        </div>

                    </div>


                    <div class="row mb-4">
                        <h5 class="mb-3">@lang('Socail Links')</h5>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="facebook">@lang('Facebook Url') <sup class="text--danger">*</sup></label>
                            <div class="custom-icon-field">
                                <i class="lab la-facebook-f"></i>
                                <input type="text" name="facebook" id="facebook" value="https://www.facebook.com/" placeholder="@lang('https://www.facebook.com/')" class="form--control" required="">
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="twitter">@lang('Twitter Url') </label>
                            <div class="custom-icon-field">
                                <i class="lab la-twitter"></i>
                                <input type="text" name="twitter" id="twitter" value="https://www.twitter.com/" placeholder="@lang('https://www.twitter.com/')" class="form--control">
                            </div>
                        </div>
                        <!--<div class="form-group col-lg-3 col-sm-6">-->
                        <!--    <label for="linkedinIn">@lang('Linkedin Url') </label>-->
                        <!--    <div class="custom-icon-field">-->
                        <!--        <i class="lab la-linkedin-in"></i>-->
                        <!--        <input type="text" name="linkedinIn" id="linkedinIn" value="{{old('linkedinIn')}}" placeholder="@lang('https://www.linkdin.com/')" class="form--control" >-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="instagram">@lang('Instagram Url') </label>
                            <div class="custom-icon-field">
                                <i class="lab la-instagram"></i>
                                <input type="text" name="instagram" id="instagram" value="https://www.instagram.com/" placeholder="@lang('https://www.instagram.com/')" class="form--control" >
                            </div>
                        </div>
                    </div> 


                    <div class="row">
                        <h5 class="mb-3">@lang('Others Information')</h5>
                        <div class="form-group col-lg-6">
                            <label for="blood_id">@lang('Blood Group') <sup class="text--danger">*</sup></label>
                            <select name="blood" id="blood_id" class="select" required="">
                               <option value="" selected="" disabled="">@lang('Select One')</option>
                               @foreach($bloods as $blood)
                                <option value="{{$blood->id}}">{{__($blood->name)}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="gender">@lang('Gender') <sup class="text--danger">*</sup></label>
                            <select name="gender" id="gender" class="select" required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                                <option value="1">@lang('Male')</option>
                                <option value="2">@lang('Female')</option>
                            </select>
                        </div>

                        <!--<div class="form-group col-lg-6">-->
                        <!--    <label for="religion">@lang('Religion') <sup class="text--danger">*</sup></label>-->
                        <!--    <input type="text" name="religion" id="religion" value="{{old('religion')}}" placeholder="@lang('Enter Religion')" class="form--control" maxlength="40" required="">-->
                        <!--</div>-->

                        <!-- <div class="form-group col-lg-6">-->
                        <!--    <label for="profession">@lang('Profession') </label>-->
                        <!--    <input type="text" name="profession" id="profession" value="{{old('profession')}}" placeholder="@lang('Enter profession')" class="form--control" maxlength="80">-->
                        <!--</div>-->

                         <div class="form-group col-lg-6">
                            <label for="donate">@lang('Total Donate') <sup class="text--danger"></sup></label>
                            <input type="number" name="donate" id="donate" value="0" placeholder="@lang('Enter total blood donate')" class="form--control">
                        </div>

                       
                        <!--<div class="form-group col-lg-6">-->
                        <!--    <label for="date_birth">@lang('Date Of Birth') <sup class="text--danger">*</sup></label>-->
                        <!--    <input type="text" id="date_birth" name="birth_date" value="{{old('birth_date')}}" data-language="en" placeholder="@lang('2000-01-30')" class="form--control datepicker-here" maxlength="255" required="">-->
                        <!--</div>-->

                         <div class="form-group col-lg-6">
                            <label for="last_donate">@lang('Last Donate') </label>
                            <input type="text" name="last_donate" id="last_donate" value="{{old('donate')}}" data-language="en" placeholder="@lang('Enter Date')" class="form--control datepicker-here">
                        </div>

                        <!--<div class="form-group col-lg-12">-->
                        <!--    <label for="about_details">@lang('About You') </label>-->
                        <!--    <textarea name="details" id="about_details" placeholder="@lang('Enter Details')" class="form--control">{{old('details')}}</textarea>-->
                        <!--</div>-->
                        
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="checkbox" id="flexCheckDefault myCheck" required >
                          <label class="form-check-label" for="flexCheckDefault">
                            @lang('Needbloodbd.com is not responsible if someone, unfortunately, harasses me using my personal information.')
                          </label>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn--base w-100">@lang('Apply Now')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
function myFunction() {
  var x = document.getElementById("myCheck").required;
  document.getElementById("demo").innerHTML = x;
}
</script>

@include($activeTemplate.'sections.faq')

@endsection


@push('style-lib')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/datepicker.min.css')}}">
@endpush
@push('script-lib')
    <script src="{{asset($activeTemplateTrue.'frontend/js/datepicker.min.js') }}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/datepicker.en.js') }}"></script>
@endpush
@push('script')
  <script>
    (function($){
        "use strict";
        $('.datepicker-here').datepicker({
            autoClose: true,
            dateFormat: 'yyyy-mm-dd',
        });

        $('select[name=city]').on('change',function() {
            $('select[name=location]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locations = $('select[name=city] :selected').data('locations');
            var html = '';
            locations.forEach(function myFunction(item, index) {
                html += `<option value="${item.id}">${item.name}</option>`
            });
            $('select[name=location]').append(html);
        });
    })(jQuery)
  </script>
@endpush
