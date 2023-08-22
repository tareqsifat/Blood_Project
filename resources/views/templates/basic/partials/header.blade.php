@php
    $contact = getContent('contact_us.content', true);
@endphp
<style>
    .user-image {
        width: 40px; /* Set the desired width */
        height: 40px; /* Set the desired height */
        object-fit: cover; /* Maintain aspect ratio and crop if necessary */
    }
    .login-btn a {
            color: #ffffff !important
        
    }
    .login-btn a:hover{
            color: #ffffff !important
        }
</style>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row align-items-center gy-2">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <ul class="header__info-list d-flex flex-wrap align-items-center justify-content-sm-start justify-content-center">
                        <li><a href="tel:{{__($contact->data_values->contact_number)}}"><i class="las la-phone"></i> {{__($contact->data_values->contact_number)}}</a></li>
                       <li><a href="mailto:{{__($contact->data_values->email_address)}}"><i class="las la-envelope"></i> {{__($contact->data_values->email_address)}}</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 text-sm-end text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-md-9 col-sm-9" >
                                <select class="language-select langSel">
                                    @foreach($language as $item)
                                        <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif>{{ __($item->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-3">
                                @if(Auth::check())
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="background-color: transparent; border: 3px solid #FB3640;">
                                            <img src="{{getImage('assets/images/donor/'. Auth::user()->donor->image, imagePath()['donor']['size'])}}" alt="User" class="rounded-circle user-image">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                            <li><a class="dropdown-item" href="{{ route('donor_login.dashboard') }}">{{Auth::user()->name}}</a></li>
                                            <form action="{{ route('blood-seeker.logout') }}" method="post">
                                                @csrf
                                                <li><button type="submit" class="dropdown-item">Logout</button></li>
                                            </form>
                                            <!-- Add more list items as needed -->
                                        </ul>
                                    </div>
                                @else
                                    <div class="container">
                                        <div>
                                            <a href="{{ route('donor_login.login')}}"><img src="https://icon-library.com/images/customer-login-icon/customer-login-icon-17.jpg" style="background-color: #ffffff; height: 50px !important; border-radius: 50%"></a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="site-logo site-title" href="{{route('home')}}">
                    <img class="lazyload" data-src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('logo')">
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu ms-auto">
                        <li><a href="{{route('home')}}">@lang('Home')</a></li>
                         @foreach($pages as $k => $data)
                            <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>
                        @endforeach
                    </ul>
                    <div class="nav-right">
                        <a href="{{route('apply.donor')}}" class="btn btn-md btn--base d-flex align-items-center"><i class="las la-user fs--18px me-2"></i> @lang('Apply as a Donor')</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>