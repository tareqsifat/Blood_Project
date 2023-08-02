<form method="POST" action="{{route('blood-seeker.register')}}" class="register_form contact-donor-form">
    @csrf
    <div class="modal-header" style="padding: 0.9981rem 1.2rem">
        <h5 class="text-white">@lang('login')</h5>
    </div>
    <div class="modal-body">
        <div class="card-body">
            <p class="text-white pb-2">@lang('user not found please provide name and mobile number for register')</p>
            <div class="form-group">
                <label class="text-white" for="mobile_number">@lang('Enter Mobile Number')</label>
                <input type="text" name="mobile_number" value="{{old('mobile_number')}}" class="form--control form-control-md" placeholder="@lang('Enter Mobile Number')" maxlength="80" required>
            </div>
            <div class="form-group">
                <label class="text-white" for="name">@lang('Enter Your Name')</label>
                <input type="text" name="name" value="{{old('name')}}" class="form--control form-control-md" placeholder="@lang('Enter Mobile Number')" maxlength="80" required>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">@lang('login')</button>
    </div>
</form>