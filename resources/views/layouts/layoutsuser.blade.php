<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        
        <style>
            main{
                padding: 50px 0;
            }
            .fl{
                float: left;
            }
            #edit{
                margin-right: 10px;
            }
        </style>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        {{ Html::style(('css/w3.css')) }}

        
      <!--   {{ Html::style(('https://fonts.googleapis.com/css?family=Raleway')) }}  -->
        {{ Html::style(('css/font-awesome.min.css')) }}


        @if (isset($style))
            @foreach ($style as $css)
                {{ Html::style(( $css )) }}
            @endforeach
        @endif
        

    </head>



<body class="w3-light-grey w3-content" style="max-width:1600px">

<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <center>
        <br><img src="/user1.png" style="width:50%;" class="w3-round"><br><br>
   <p class="w3-text-grey">Hi, Korawit</p>
    <h5><b>USER PAGE</b></h5>
</center>
  </div>
  <div class="w3-bar-block">

@guest
<a href="{{ route('login') }}">Login</a>
<a href="{{ route('register') }}">Register</a>

@else
    <!-- <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>HOME</a>  -->
    <a href="/user/home" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw w3-margin-right"></i>HOME</a> 
    <a href="{{ route ('user.borrow')}}" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>BORROW SPORTS</a> 
  <!--   <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-shopping-cart fa-fw w3-margin-right"></i>CART</a>  -->
    <a href="/user/profile" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-address-card fa-fw w3-margin-right"></i>EDIT PROFILE</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>



<a href="{{ route('logout') }}"
onclick="event.preventDefault();
     document.getElementById('logout-form').submit();" class="w3-bar-item w3-button w3-padding">
<i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
@endguest


  </div>
</nav>




<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header  -->
  <header id="portfolio">


  
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">


<center><img class="img-responsive" src="/h1.jpg" width="1130" height="156"></center>

<!--     <div class="w3-section w3-bottombar w3-padding-16">
      <button class="w3-button w3-black">Filter 1</button>
      <button class="w3-button w3-white">Filter 2</button>
      <button class="w3-button w3-white">Filter 3</button>
      <button class="w3-button w3-white">Filter 4</button>
    </div> -->
    </div>
  </header>





        <div class="w3-container">
            @yield('content')
        </div>

        {{ Html::script('js/bootstrap.min.js') }}
        {{ Html::script('js/jquery.min.js') }}

        @if (isset($script))
            @foreach ($script as $js)
                {{ Html::script(($js)) }}
            @endforeach
        @endif


<!-- End Section -->
<div class="w3-black w3-center w3-padding-24">Copyright © 2017 PSU Sports Equipment.<br> Prince of Songkla University Phuket Campus</div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
</html>
