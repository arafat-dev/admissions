<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ config('app.name', 'Admission') }} | @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/student_front/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('assets/student_front/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!--<link rel="stylesheet" href="{{asset('assets/student_front/css/owl.carousel.min.css')}}">-->
  <!--<link rel="stylesheet" href="{{asset('assets/student_front/css/owl.theme.default.min.css')}}">-->
  <!--<link rel="stylesheet" href="{{asset('assets/student_front/css/owl.theme.default.min.css')}}">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="{{asset('assets/student_front/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{asset('assets/student_front/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{asset('assets/student_front/css/aos.css')}}">
  <link href="{{asset('assets/student_front/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css')}}">

  <link rel="stylesheet" href="{{asset('assets/student_front/css/style.css')}}">
  <style type="text/css">
    i.fam {
      display: inline-block;
      border-radius: 60px;
      box-shadow: 0px 0px 2px #888;
      padding: 0.5em 0.6em;

    }
  </style>



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
@include('web_front.preheader')
@include('web_front.header')

<div class="site-section">
<div class="container-fluid text-center">    
  <div class="row content">
  <!-- Left Sidenav -->
  @include('web_front.leftsidenav')
  <!-- Content -->
  @yield('content')
  <!-- Right Sidenav -->
  @include('web_front.rightsidenav')
  </div>
</div>   
</div> 


  @include('web_front.footer')
    

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('assets/student_front/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('assets/student_front/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/student_front/js/bootstrap.min.js')}}"></script>
  <!--<script src="{{asset('assets/student_front/js/owl.carousel.min.js')}}"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script src="{{asset('assets/student_front/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('assets/student_front/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('assets/student_front/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/student_front/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('assets/student_front/js/aos.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('assets/student_front/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/student_front/js/jquery.mb.YTPlayer.min.js')}}"></script>




  <script src="{{asset('assets/student_front/js/main.js')}}"></script>

</body>

</html>