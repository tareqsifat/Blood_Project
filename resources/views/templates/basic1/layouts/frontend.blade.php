
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
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/bootstrap.min.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/all.min.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/line-awesome.min.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lightcase.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/slick.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/main.css')}}" media="print" onload="this.media='all'; this.onload=null;">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/preloader.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}" media="print" onload="this.media='all'; this.onload=null;">
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
    </body>
</html>
