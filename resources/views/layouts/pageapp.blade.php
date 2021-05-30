<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/images/t_icon.png" type="image/Icon">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">



    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

 



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

  </head>
<body>
<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
							<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +8801704202677</a> 
							<a href="#"><span class="fa fa-paper-plane mr-1"></span> transportmanagementsystem@gmail.com</a>
						</p>
					</div>
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fab fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fab fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fab fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    		</p>
		        </div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
      <a class="navbar-brand" href="/"><img src="assets/images/logo-tms.png" alt="Logo" style="width:130px; height: 40px;"></a>
	    	
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto"> 
            <li class="nav-item "><a href="/" class="nav-link">Home</a></li> 
            <li class="nav-item"><a href="{{ route('customer.profileGet') }}" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="{{ route('customer.myBooks') }}" class="nav-link">My Bookings</a></li>                         
	        	<li class="nav-item"><a href="{{ route('customer.aboutGet') }}" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="{{ route('customer.contactGet') }}" class="nav-link">Contact</a></li>            
            @guest
              <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">LOGIN</a></li>
                  @if (Route::has('register'))
                      <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">REGISTER</a></li> 
                  @endif 
                  @else
                  <li class="nav-item dropdown">
                        <a style="color: white;" id="navbarDropdown" class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a style="color: dark;" class="dropdown-item" href="{{ route('customer.profileGet') }}">
                                            My Profile
                                    </a>
                                    <a style="color: dark;" class="dropdown-item" href="{{ route('customer.myBooks') }}">
                                            My Books
                                    </a>                                                                   
                                    <a style="color: #f5031a;" class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>                                
                            </div>
                      </li>                            
          @endguest              
	        </ul>
	      </div>
	    </div>
	  </nav>



 
 





	    <main class="py-4">
            @yield('content')
      </main>





      
      <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <a class="navbar-brand" href="index.html"><img src="assets/images/logo-tms.png" alt="Logo" style="width:220px;"></a>
						<p>TMS Online services Bangladesh.</p>
						<ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fab fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fab fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fab fa-instagram"></span></a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Latest News</h2>
            <h6 style="color: white;">Driver of the month:</h6>
						<div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url(images/Rankno1.jfif);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">#1 Billal Mia</a><br></h3>
                <div class="meta">
                  <!--
                  <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  -->
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url(images/Rankno2.jfif);"></a>
              <div class="text">
              <h3 class="heading"><a href="#">#2 Sukkur Ali</a><br></h3>
                <div class="meta">
                  <!--
                  <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  -->
                </div>
              </div>
            </div>
            
					</div>
					<div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Home</a></li>
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Works</a></li>
              <li><a href="#" class="py-2 d-block">Blog</a></li>
              <li><a href="#" class="py-2 d-block">Contact</a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Have a Questions?</h2>
						<div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map"></span><span class="text">Kurigram,Rangpur,Bangladesh</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+8801704202677</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">transportmanagementsystem@gmail.com</span></a></li>
              </ul>
            </div>
					</div>
				</div>
      </div>
      <div class="row mt-5">
          <div class="col-md-12 text-center">
            <p class="copyright">
            TMS © <script>document.write(new Date().getFullYear());</script> powered by SmartCitizen
            </p>
          </div>
      </div>      
		</footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>-->
  <script src="js/main.js"></script>


<!-- For Datetime -->
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            $.extend(true, $.fn.datetimepicker.defaults, {
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'far fa-calendar-check-o',
                    clear: 'far fa-trash',
                    close: 'far fa-times'
                }
            });
        });
        </script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                  ignoreReadonly: true
                });
            });

            $(function () {
                $('#datetimepicker1').datetimepicker({
                  format: 'YYYY-MM-DD',
                  ignoreReadonly: true
                });
            });

            $(function () {
                $('#datetimepicker2').datetimepicker({
                  format: 'hh:mm a',
                  ignoreReadonly: true
                });
            });

            $(function () {
                $('#datetimepicker3').datetimepicker({
                  format: 'HH:mm',
                  ignoreReadonly: true
                });
            });

            $(function () {
              var minDate = new Date();

              minDate.setDate(minDate.getDate()-5); // set days - mean previous date from current date + mean future date from current date

                $('#datetimepicker4').datetimepicker({
                  format: 'YYYY-MM-DD',
                  minDate: minDate,
                  ignoreReadonly: true
                });
            });

            $(function () {
              var minDate = new Date();
              var maxDate = new Date();

              minDate.setDate(minDate.getDate()-5); // set days - mean previous date from current date + mean future date from current date
              maxDate.setDate(maxDate.getDate()+10);
                $('#datetimepicker5').datetimepicker({
                  format: 'YYYY-MM-DD',
                  minDate: minDate,
                  maxDate: maxDate,
                  ignoreReadonly: true
                });
            });

</script>





</body>
</html>








