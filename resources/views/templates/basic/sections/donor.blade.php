@php
    $donor = getContent('donor.content', true);
    $donors = App\Models\Donor::where('status', 1)->orderBy('total_donate', 'DESC')->with('blood')->limit(4)->get();
@endphp

<section class="pt-100 pb-100 border-top  position-relative z-index-2 overflow-hidden">
    <div class="bottom-el-bg">
        <img class="lazyload" data-src="{{getImage('assets/images/frontend/donor/'. @$donor->data_values->background_image, '1920x596')}}" alt="@lang('image')">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{__(@$donor->data_values->heading)}}</h2>
                    <p class="mt-2">{{__($donor->data_values->sub_heading)}}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gy-4">
            @foreach($donors as $donor)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="donor-card style--two has--link section--bg2">
                        <a href="{{route('donor.details', [slug($donor->name), encrypt($donor->id)])}}" class="item--link"></a>
                        <div class="donor-card__thumb">
                            <img class="lazyload" data-src="{{getImage('assets/images/donor/'. $donor->image, imagePath()['donor']['size'])}}" alt="@lang('image')">
                        </div>
                        <div class="donor-card__content">
                            <h6 class="donor-card__name">{{__($donor->name)}}</h6>
                            <p class="fs--14px text-white">@lang('Blood Group') : <span class="text--base">({{__($donor->blood->name)}})</span></p>
                            <span class="donor-card__amount mt-1"><i class="las la-tint"></i> {{__($donor->total_donate)}} @lang('Times')</span>
                            <a href="{{route('donor.details', [slug($donor->name), encrypt($donor->id)])}}">  <button type="submit" class="btn btn-md btn--base">@lang('View Profile')</button></a>



                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
