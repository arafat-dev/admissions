<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title> Student | Authentication </title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('hria/assets/js/config.js')}}"></script>
    <script src="{{ asset('hria/vendors/simplebar/simplebar.min.js')}}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('hria/vendors/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <link href="{{ asset('hria/assets/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('hria/assets/css/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{ asset('hria/assets/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('hria/assets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
     @stack('style-lib')
     @stack('style')
  </head>

  <body style="background: white">


    @yield('content')

    @stack('script-lib')

    @stack('script')
        <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('hria/vendors/popper/popper.min.js')}}"></script>
    <script src="{{ asset('hria/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('hria/vendors/anchorjs/anchor.min.js')}}"></script>
    <script src="{{ asset('hria/vendors/is/is.min.js')}}"></script>
    <script src="{{ asset('hria/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{ asset('hria/vendors/lodash/lodash.min.js')}}"></script>
    <script src="{{ asset('hria/vendors/list.js')}}/list.min.js')}}"></script>
    <script src="{{ asset('hria/assets/js/theme.js')}}"></script>
  </body>


</html>
