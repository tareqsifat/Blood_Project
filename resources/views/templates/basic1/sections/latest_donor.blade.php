@php
    $donor = getContent('latest_donor.content', true);
    $donors = App\Models\Donor::where('status', 1)->orderBy('id', 'DESC')->with('blood')->limit(4)->get();
@endphp

<section class="pt-100 pb-100 border-top  position-relative z-index-2 overflow-hidden">
    <div class="bottom-el-bg">
        <img src="{{getImage('assets/images/frontend/latest_donor/'. @$donor->data_values->background_image, '1920x596')}}" alt="@lang('image')">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{__(@$donor->data_values->heading)}}</h2>
                    <p class="mt-2">{{__(@$donor->data_values->sub_heading)}}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gy-4">
            @foreach($donors as $donor)
                <div class="col-100-5 col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="donor-card style--three has--link">
                        <a href="{{route('donor.details', [slug($donor->name), encrypt($donor->id)])}}" class="item--link"></a>
                        <div class="donor-card__thumb">
                            	@if($donor->image == null)

            						@if($donor->gender == 1) 
            						<img src="{{getImage('assets/images/donor/male.jpg')}}">
            
            						@else 
            						<img src="{{getImage('assets/images/donor/femail.jpg')}}">
            
            						@endif
            
            					@else
            						
            						<img src="{{getImage('assets/images/donor/'. $donor->image, imagePath()['donor']['size'])}}" alt="@lang('image')">
            					@endif
                          
                        </div>
                        <div class="donor-card__content">
                            <h6 class="donor-card__name">{{__($donor->name)}}</h6>
                            <p class="text-white fs--14px"><i class="las la-tint"></i>@lang('Blood Group') : ({{__($donor->blood->name)}})</p>
                            <p class="text-white fs--14px"><i class="las la-map-marker-alt mt-2"></i>@lang('City') : ({{__($donor->city->name)}})</p>
                        

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
   