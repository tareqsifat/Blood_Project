@extends($activeTemplate.'layouts.frontend')
@section('content')
    @php
        $breadcrumb = getContent('breadcrumb.content', true);
    @endphp
    <form method="POST" action="{{route('blood-seeker.send_auth_otp')}}" class="login_register_form contact-donor-form">
        @csrf
        <h5 class="text-white">@lang('login')</h5>
        <div class="card-body">
            <div class="form-group">
                <label class="text-white" for="mobile_number">@lang('Enter Mobile Number')</label>
                <input type="text" name="mobile_number" value="{{old('mobile_number')}}" class="form--control form-control-md" placeholder="@lang('Enter Mobile Number')" maxlength="80" required>
                <p class="text-danger invalid_number d-none">@lang('not a valid bangladeshi mobile number')</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">@lang('login')</button>
    </form>
@endsection