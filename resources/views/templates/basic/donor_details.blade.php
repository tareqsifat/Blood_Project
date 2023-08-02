@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $breadcrumb = getContent('breadcrumb.content', true);
@endphp

{{-- start of internal css --}}
<style>
	.dropdown-btn{
		padding: 0.75rem 1.6rem;
		display: inline-block;
		font-weight: 400;
		line-height: 1.5;
		color: #212529;
		text-align: center;
		text-decoration: none;
		vertical-align: middle;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
		background-color: transparent;
		border: 1px solid #ffffff26;
		font-size: 1rem;
		border-radius: .25rem;
		transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}
    /* Custom select option design */
    .option {
      background-color: #17173a;
      color: #505050;
      border: 1px solid #3d3b5600;
	}
</style>
{{-- End of enternal css --}}


<div class="profile-header dark--overlay bg_img " style="background-image: url({{getImage('assets/images/frontend/breadcrumb/'. @$breadcrumb->data_values->background_image, '1920x1440')}});">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="donor-profile">
					<div class="donor-profile__thumb">

					@if($donor->image == null)

						@if($donor->gender == 1)
						<img class="lazyload" data-src="{{getImage('assets/images/donor/male.jpg')}}">

						@else
						<img class="lazyload" data-src="{{getImage('assets/images/donor/femail.jpg')}}">

						@endif

					@else

						<img class="lazyload" data-src="{{getImage('assets/images/donor/'. $donor->image, imagePath()['donor']['size'])}}" alt="@lang('image')">
					@endif

					</div>
					<div class="donor-profile__content">
						<h3 class="donor-profile__name">{{__($donor->name)}}</h3>
						<p><i class="las la-map-marker-alt mt-2"></i> @lang('Location') : {{__($donor->location->name)}}, {{__($donor->city->name)}}</p>
						<ul class="d-flex flex-wrap align-items-center donor-card__social justify-content-center mt-1">
                            <li><a href="{{__(@$donor->socialMedia->facebook)}}" target="_blank" tabindex="-1"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="{{__(@$donor->socialMedia->twitter)}}" target="_blank" tabindex="-1"><i class="lab la-twitter"></i></a></li>
                          <!--<li><a href="{{__(@$donor->socialMedia->linkedinIn)}}" target="_blank" tabindex="-1"><i class="lab la-linkedin-in"></i></a></li>-->
                            <li><a href="{{__(@$donor->socialMedia->instagram)}}" tabindex="-1"><i class="lab la-instagram"></i></a></li>
                        </ul>
					</div>
				</div>
			</div>
		</div>
		<div class="blood-donor-info-area">
			<div class="row justify-content-center">
				<div class="col-xl-3 col-lg-4">
					<div class="dono-info-item d-flex align-items-center justify-content-center">
						<h5 class="text-white me-3"><i class="las la-tint"></i> @lang('Blood Group') : </h5>
						<p class="text--base">{{__($donor->blood->name)}}</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 mt-lg-0 mt-3">
					<div class="dono-info-item d-flex align-items-center justify-content-center">
						<h5 class="text-white me-3"><i class="las la-calendar-check"></i> @lang('Last Donate') : </h5>
						<p class="text--base">{{showDateTime($donor->last_donate, 'd M Y')}}</p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 mt-lg-0 mt-3">
					<div class="dono-info-item d-flex align-items-center justify-content-center">
						<h5 class="text-white me-3"><i class="las la-clipboard-list"></i> @lang('Total Donate') : </h5>
						<p class="text--base">{{__($donor->total_donate)}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="pt-100 pb-50 shade--bg">
	<div class="container">
		<div class="row gy-4">
			<div class="col-lg-8 pe-lg-5">
				<h3>@lang('Donor Details')</h3>
				<p class="mt-2">{{__($donor->details)}}</p>
				<div class="mt-4">
					@php
	                    echo advertisements('820x213')
	                @endphp
				</div>
				<ul class="caption-list-two mt-4">
					<li>
						<span class="caption">@lang('Name')</span>
						<span class="value">{{__($donor->name)}}</span>
					</li>
					
					<li>
						<span class="caption">@lang('Address')</span>
						<span class="value">({{__($donor->location->name)}})  {{__($donor->city->name)}}</span>
					</li>
					
					<li>
						<span class="caption">@lang('Age')</span>
						<span class="value">{{Carbon\Carbon::parse($donor->birth_date)->age}} @lang('Years')</span>
					</li>
					
					<li>
						<span class="caption">@lang('Gender')</span>
						<span class="value">@if($donor->gender == 1) @lang('Male') @else @lang('Female') @endif</span>
					</li>
					
					<li>
						<span class="caption">@lang('Religion')</span>
						<span class="value">{{__($donor->religion)}}</span>
					</li>
					
					<li>
						<span class="caption">@lang('Email')</span>
						<span class="value">{{__($donor->email)}}</span>
					</li>
					<li>
						<span class="caption">@lang('Phone')</span>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sorryModal" style="margin-left: 20px">
							{{__($donor->phone)}}
						</button>
					</li>
					
				</ul>

				<div class="mt-4">
					@php
	                    echo advertisements('820x213')
	                @endphp
				</div>

			</div>
			<div class="col-lg-4">
				<div class="custom--card section--bg2">
					<div class="card-header">
						<h5 class="text-white">@lang('Contact with Donor')
							@if(App::getLocale() == 'bn')
								(বাংলায় লিখুন)
							@endif
						</h5>
					</div>
					@php
						$auth_name = Auth::check() ? Auth::user()->name : '';
						$auth_number = Auth::check() ? Auth::user()->mobile : '';
					@endphp
					<div class="card-body">
						<form method="POST" action="{{route('donor.contact')}}" class="contact-donor-form">
							@csrf
							<input type="hidden" name="donor_id" value="{{$donor->id}}">
							<div class="form-group">
								<input type="text" name="name" value="{{ old('name', $auth_name) }}" class="form--control form-control-md" placeholder="@lang('Enter name')" maxlength="80" required>
							</div>
							<div class="form-group">
								<input type="number" name="number" value="{{old('number', $auth_number) }}" class="form--control form-control-md" placeholder="@lang('Enter phone number')" maxlength="80" required>
							</div>
							<div class="form-group">
								<input type="text" name="hospital" value="{{old('hospital')}}" class="form--control form-control-md" placeholder="@lang('name of the hospital')" maxlength="80" required>
							</div>
							<div class="row">
								<div class="form-group col"><select class="form-select form-select-lg mb-3 form--control form-control-md flipthis-highlight" name="district">
										<option class="option">@lang('District')</option>
										@foreach ($cities as $city)
											<option value="{{$city->name}}" class="option">
												{{$city->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col">
									<input type="text" name="thana" value="{{old('thana')}}" class="form--control form-control-md" placeholder="@lang('Thana')" maxlength="80" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group class_blood_group col-6">
									<select class="form-select form-select-lg mb-3 form--control form-control-md flipthis-highlight" name="blood_group" aria-label=".form-select-lg example">
										<option class="option">@lang('Blood group')</option>
										@foreach ($bloods as $blood)
											<option class="option">{{$blood->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-6">
									<input type="date" name="donation_time" value="{{old('donation_time')}}" class="form--control form-control-md" placeholder="@lang('Blood donation time')" maxlength="80" required>
								</div>
							</div>
							<button class="btn btn--base w-100" @if($sorry_message != null) data-bs-toggle="modal" data-bs-target="#MessageLimitExceetedModal" type="button" @else type="submit" @endif>@lang('Message Now')</button>
						</form>
					</div>
				</div>
				 <div class="mt-4">
				 	@php
	                    echo advertisements('416x554')
	                @endphp
				 </div>
			</div>
		</div>
	</div>
</section>

{{-- Sorry Modal --}}
<div class="modal fade" id="sorryModal" tabindex="-1" aria-labelledby="sorryModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content" style="background :#17173A">
		<div class="modal-header" style="border-bottom:1px solid #ffffff26">
		  <h5 class="modal-title text-white" id="sorryModalLabel">দুঃখিত!!</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:#fff"></button>
		</div>
		<div class="modal-body">
		  <span class="text-white">দুঃখিত!! ডোনারের নিরাপত্তা জনিত কারণে মোবাইল নাম্বার প্রকাশ করা সম্ভব হচ্ছেনা, ডোনারকে মেসেজ দিতে নিচের ফর্মটি পুরন করে 'মেসেজ পাঠান' এ ক্লিক করুন</span>
		</div>
		<div class="modal-footer" style="border-top: 1px solid #ffffff26">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #ffffff26">বন্ধ করুন</button>
		</div>
	  </div>
	</div>
  </div>
  <div class="modal fade" id="MessageLimitExceetedModal" tabindex="-1" aria-labelledby="MessageLimitExceetedModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content" style="background :#17173A">
		<div class="modal-header" style="border-bottom:1px solid #ffffff26">
		  <h5 class="modal-title text-white" id="sorryModalLabel">দুঃখিত!!</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:#fff"></button>
		</div>
		<div class="modal-body">
		  <span class="text-white">{{$sorry_message}}</span>
		</div>
		<div class="modal-footer" style="border-top: 1px solid #ffffff26">
		  <button type="button" class="btn btn-secondary login_modal_call" data-bs-dismiss="modal" style="background-color: #ffffff26">@lang('login')</button>
		  <button type="button" class="btn btn-secondary registration_modal_call" data-bs-dismiss="modal" style="background-color: #ffffff26">@lang('registration')</button>
		</div>
	  </div>
	</div>
  </div>
@endsection
