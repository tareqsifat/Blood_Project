@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="donor-search-area">
    <div class="container">
        <form method="GET" action="{{route('donor.search')}}" class="donor-search-form">
            <div class="donor-search-form__field">
                <label>@lang('Blood Group')</label>
                <select class="select" name="blood_id">
                    <option value="" selected="" disabled="">@lang('Select Group')</option>
                    @foreach($bloods as $blood)
                        <option value="{{$blood->id}}" @if(@$bloodId == $blood->id) selected @endif>{{__($blood->name)}}</option>
                    @endforeach
                </select>
            </div>

            <div class="donor-search-form__field">
                <label>@lang('City')</label>
                <select class="select" name="city_id">
                    <option value="" disabled="" selected="">@lang('Select One')</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}" data-locations="{{json_encode($city->location)}}">{{__($city->name)}}</option>
                    @endforeach
                </select>
            </div>

            <div class="donor-search-form__field">
                <label>@lang('Location')</label>
                <select class="select" name="location_id">
                    <option value="" selected="" disabled="">@lang('Select One')</option>
                </select>
            </div>

            <div class="donor-search-form__field">
                <label>@lang('Donor Type')</label>
                <select class="select" name="gender">
                    <option value="" selected="" disabled="">@lang('Select One')</option>
                    <option value="1" @if(@$gender == 1) selected @endif>@lang('Male')</option>
                    <option value="2" @if(@$gender == 2) selected @endif>@lang('Female')</option>
                </select>
            </div>

            <div class="donor-search-form__btn">
                <button type="submit" class="btn btn-md btn--base">@lang('Search')</button>
            </div>
        </form>
    </div>
</div>

<section class="pt-50 pb-50 shade--bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 d-md-block d-none">
                @php
                    echo advertisements('220x474')
                @endphp

                @php
                    echo advertisements('220x303')
                @endphp

                @php
                    echo advertisements('220x474')
                @endphp

                @php
                    echo advertisements('220x474')
                @endphp
            </div>




            <div class="col-xl-8 col-lg-9 col-md-8">
                <div class="row gy-4">
                    @forelse($donors as $donor)
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="donor-item has--link">
                                <a href="{{route('donor.details', [slug($donor->name), encrypt($donor->id)])}}" class="item--link"></a>
                                <div class="donor-item__thumb">
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
                                <div class="donor-item__content">
                                    <h5 class="donor-item__name">{{__($donor->name)}}</h5>
                                    <ul class="donor-item__list mt-2">

                                        <li>
                                            <i class="las la-tint"></i>@lang('Blood Group') : <span class="text--base">({{__($donor->blood->name)}})</span>
                                        </li>
                                        <li>
                                            <i class="las la-map-marker-alt"></i>@lang('City') : <span class="text--base">({{__($donor->city->name)}})</span>
                                        </li>


                                    </ul>
                                    <a href="{{route('donor.details', [slug($donor->name), encrypt($donor->id)])}}"  <button type="submit" class="btn btn-md btn--base">@lang('Contact')</button></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-center">দুঃখিত, উক্ত লোকেশনে এখন পর্যন্ত কোনো রক্তদাতা নেই !</h3>
                    @endforelse
                </div>
                <nav class="mt-4 pagination-md">
                {{$donors->links()}}
                </nav>
            </div>
            <div class="col-xl-2 d-xl-block d-none">
                @php
                    echo advertisements('220x474')
                @endphp

                @php
                    echo advertisements('220x315')
                @endphp

                @php
                    echo advertisements('220x474')
                @endphp

                @php
                    echo advertisements('220x474')
                @endphp
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    (function($){
        "use strict";

        $('select[name=city_id]').on('change',function() {
            $('select[name=location_id]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locations = $('select[name=city_id] :selected').data('locations');
            var html = '';
            locations.forEach(function myFunction(item, index) {
                html += `<option value="${item.id}">${item.name}</option>`
            });
            $('select[name=location_id]').append(html);
        });

    })(jQuery)
</script>
@endpush
