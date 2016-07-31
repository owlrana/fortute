    
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Home | Foutute</title>
<!-- Bootstrap -->
<link href="{{url('themes/front/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Custom css -->
<link href="{{url('themes/front/css/custom.css')}}" rel="stylesheet">
<!-- Custom css -->
<link href="{{url('themes/front/css/font-awesome.min.css')}}" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="{{url('themes/front/images/favicon.png')}}" />
<!-- Custom css -->
<link href="{{url('themes/front/css/flexslider.css')}}" rel="stylesheet">
<!-- search css for header-->
<link href="{{url('themes/front/css/search.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
</head>
<body>
<section class="navbar-wrap" id="home"> 
  <!-- Static navbar -->
  <nav class="navbar navbar-default navbar-fixed-top custom-nav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="http://fortute.com/"><img src="{{url('themes/front/images/logo.png')}}"/></a> </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="anchorLink active" href="#home">Home</a></li>
          <li><a class="anchorLink" href="#features">Features </a></li>
          <li><a class="anchorLink" href="#about">About Us</a></li>
          <li><a class="anchorLink" href="#price">Pricing </a></li>
          <li><a class="anchorLink" href="#download">Download </a></li>
          <li><a class="br-none anchorLink" href="#contact">Contact</a></li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </nav>
</section>
<div class="clearfix"></div>
<section class="banner-con" style="background:url('{{url('uploads/home')}}/{{$content[0]->slider_image}}') no-repeat top left;">
  <div class="container">
    <div class="row p50">
      <div class="col-md-6">
        <div class="absolute-con"> <span class="soft-text">{{$content[0]->slider_title}}</span>
          <p>{{$content[0]->slider_content}} </p>
          <!-- <a  href="#" class="btn btn-default custom-btn">Read More</a> <span><br /> -->
        </div>
      </div>
      <div class="col-md-6 text-center"> <img src="{{url('themes/front/images/main-right.png')}}" class="img-responsive" /> </div>
    </div>
  </div>
</section>
<!--Banner-con close here--> 

<!--feature Start here--> 
<span id="features"></span>
<section class="slider testo-slider">
  <div class="container"> <span class="head2">Features</span>
    <div class="flexslider">
      <ul class="slides">
        <li>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f1.png')}}" class="img-responsive"> </div>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f2.png')}}" class="img-responsive"> </div>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f3.png')}}" class="img-responsive"> </div>
        </li>
        <li>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f1.png')}}" class="img-responsive"> </div>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f2.png')}}" class="img-responsive"> </div>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f3.png')}}" class="img-responsive"> </div>
        </li>
        <li>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f1.png')}}" class="img-responsive"> </div>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f2.png')}}" class="img-responsive"> </div>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f3.png')}}" class="img-responsive"> </div>
        </li>
        <li>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f1.png')}}" class="img-responsive"> </div>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f2.png')}}" class="img-responsive"> </div>
          <div class="col-sm-4 col-xs-4"> <img src="{{url('themes/front/images/f3.png')}}" class="img-responsive"> </div>
        </li>
      </ul>
    </div>
  </div>
</section>
<!--feature close here--> 

<!--about-con start here--> 
<span id="about"></span>
<section class="about-con" >
  <div class="container">
    <h1 class="text-center">About Us</h1>
    <div class="row">
      <div class="col-md-4">
        <h2>{{$content[0]->about_tabone_heading}}</h2>
        <p>{{$content[0]->about_tabone}}</p>
      </div>
      <div class="col-md-4">
        <h2>{{$content[0]->about_tabtwo_heading}}</h2>
        <p>{{$content[0]->about_tabtwo}}</p>
      </div>
      <div class="col-md-4">
        <h2>{{$content[0]->about_tabthree_heading}}</h2>
        <p>{{$content[0]->about_tabthree}}</p>
      </div>
    </div>
  </div>
</section>
<!--about-con close here--> 

<!--pricing Start here--> 
<span id="price"></span>
<section class="pricing" >
  <div class="container">
    <h1 class="text-center">Pricing</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="box-price">
          <div class="price-item">
            <h2><i class="fa fa-inr"></i> {{$content[0]->first_price}}</h2>
          </div>
          <p>{{$content[0]->first_grade}}</p>
          <button class="order">Hire Tutor</button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box-price">
          <div class="price-item">
            <h2><i class="fa fa-inr"></i> {{$content[0]->second_price}}</h2>
          </div>
          <p>{{$content[0]->second_grade}}</p>
          <button class="order">Hire Tutor</button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box-price">
          <div class="price-item">
            <h2><i class="fa fa-inr"></i> {{$content[0]->third_price}}</h2>
          </div>
          <p>{{$content[0]->third_grade}}</p>
          <button class="order" onclick="()">Hire Tutor</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!--download Start here--> 
<span id="download"></span>
<div class="m10">
  <h1 class="text-center">Download</h1>
</div>
<section class="download" >
  <div class="container">
    <div class="row">
      <div class="col-md-8 text-center"> <img src="{{url('uploads/home')}}/{{$content[0]->download_image}}"  style="max-width:100%;"/> </div>
      <div class="col-md-4 text-center"> <img src="{{url('themes/front/images/google-play.png')}}" class="m60"> </div>
    </div>
  </div>
</section>

<!--contactus-con start here--> 
<span id="contact"> </span>
<section class="contact-con">
  <div class="container">
    <h1 class="text-center">Contact</h1>
    <div class="col-md-12">
      <form class="form-horizontal" method="POST" action="{{url('send_mail')}}">
        {{csrf_field()}}
        <div class="form-group">
          <div class="col-sm-6">
            <input type="text" class="form-control" name="name" placeholder="Enter your name">
          </div>
          <div class="col-sm-6">
            <input type="email" class="form-control" name="email" placeholder="Enter your email address">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6">
            <input type="text" class="form-control" nanme="mobile" placeholder="Enter your mobile no">
          </div>
          <div class="col-sm-6">
            <select class="form-control sel-field" name="type">
            <option>Tutor/Student</option>
            <option value="Student">Student</option>
            <option value="Tutor">Tutor</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <textarea class="form-control" rows="3" name="message" placeholder="Message"></textarea>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-danger btn-lg send_mail">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>
 
<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
</div>
<!--footer start here-->
<footer id="footer">
  <div class="container">
    <ul>
      <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
      <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
      <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
    </ul>
    <span class="copyright">@ Copy Right Fortute 2016 <a href="#"> Terms & Condition</a> | <a href="#">Privacy Policy</a> </span> </div>
</footer>
<!--footer end here--> 
<!-----button play store------->
<div class="play-store">
<a href="#"><img src="http://fortute.com/themes/front/images/google-play.png"></a>
</div>
<!--button play store end--> 


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="{{url('themes/front/js/jquery.min.js')}}"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="{{url('themes/front/js/bootstrap.min.js')}}"></script> 
<script src="{{url('themes/front/js/jquery.flexslider.js')}}"></script> 
<script src="{{url('themes/front/js/search.js')}}"></script> 
<script type="text/javascript">
       $(document).ready(function(){
            $('a[href^="#"]').on('click',function (e) {
                e.preventDefault();
        
                var target = this.hash;
                $target = $(target);
        
                $('html, body').stop().animate({
                    'scrollTop':  $target.offset().top
                }, 900, 'swing', function () {
                    window.location.hash = target;
                });
            });
        });
        <!--menu scroll end here-->
        
        <!--happy clients slider start here-->
        $(window).load(function(){
          $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
              $('body').removeClass('loading');
            }
          });
        });
        <!--happy clients slider start here-->
 
  
  <!--------bottom to top--------->
  
  $(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
        if ($(window).scrollTop() > 100) {
            $('.scroll-top-wrapper').addClass('show');
        } else {
            $('.scroll-top-wrapper').removeClass('show');
        }
    });
 
    $('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = $('body');
    offset = element.offset();
    offsetTop = offset.top;
    $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});
</script>
  
</body>
</html>
