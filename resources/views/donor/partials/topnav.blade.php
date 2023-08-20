<!-- navbar-wrapper start -->
<nav class="navbar-wrapper">
    <form class="navbar-search" onsubmit="return false;">
        <button type="submit" class="navbar-search__btn">
            <i class="las la-search"></i>
        </button>
        <input type="search" name="navbar-search__field" id="navbar-search__field"
               placeholder="Search...">
        <button type="button" class="navbar-search__close"><i class="las la-times"></i></button>

        <div id="navbar_search_result_area">
            <ul class="navbar_search_result"></ul>
        </div>
    </form>

    <div class="navbar__right">
        <ul class="navbar__action-list">

            <li class="dropdown">
                <button type="button" class="" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                  <span class="navbar-user">
                    <span class="navbar-user__thumb">
                        @if($user->image == null)

						@if($donor->gender == 1)
						<img src="{{getImage('assets/images/donor/male.jpg')}}">

						@else
						<img src="{{getImage('assets/images/donor/femail.jpg')}}">

						@endif

					@else

						<img src="{{getImage('assets/images/donor/'. $user->image, imagePath()['donor']['size'])}}" alt="@lang('image')">
					@endif
                        {{-- <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" alt="image"> --}}
                    </span>
                    <span class="navbar-user__info">
                        {{-- {{auth()->guard('admin')->user()->username ? auth()->guard('admin')->user()->username : ''}} --}}
                      <span class="navbar-user__name"></span>
                    </span>
                    <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                  </span>
                </button>
                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                    <a href="#"
                       class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-user-circle"></i>
                        <span class="dropdown-menu__caption">{{Auth::user()->name}}</span>
                    </a>

                    <a href="{{ route('donor_login.logout') }}"
                       class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                        <span class="dropdown-menu__caption">@lang('Logout')</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- navbar-wrapper end -->
