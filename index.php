<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
        
        <!-- Standard Meta -->
       
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Site Properties -->
        <title>Hall Booking System</title>

        <!-- Google Fonts -->
       	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">
       	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
		
        <!-- CSS -->
        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/tiny-date-picker.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/media-query.css" />
        <link rel="stylesheet" href="css/index.css" />

		<style>
			body
			* {box-sizing: border-box;font-family: 'Poppins', sans-serif;}
		</style>

</head>


<body class="impx-body" id="top">

    	<!-- HEADER -->
		<header id="impx-header">
			<div>
				<div class="impx-menu-wrapper style2" data-uk-sticky="top: .impx-slide-container; animation: uk-animation-slide-top">

					<!-- Mobile Nav Start -->
					<div id="mobile-nav" data-uk-offcanvas="mode: push; overlay: true">
				        <div class="uk-offcanvas-bar">

				            <ul class="uk-nav uk-nav-default">
				                <li class="uk-parent uk-active">
				                	<a href="index.html">Home</a>
				                	<ul class="uk-nav-sub">
				                	</ul>
				                </li>
				                <li><a href="restaurant.html">Catering</a></li>
				                <li><a href="test.php">Check My Reservation</a></li>
				                <li><a><?php echo $_SESSION['Cust_name'] ?></a></li>
				                <li><a href="index.html">Log Out</a></li>
				            </ul>

				        </div>
				    </div>
				    <a href="#mobile-nav" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav" data-uk-toggle="target: #mobile-nav"><i class="fa fa-bars"></i>Menu</a>
		            <!-- Mobile Nav End -->

		            <!-- Top Header -->
					<div class="impx-top-header style2">
						<div class="uk-container uk-container-expand">
							
							<div class="uk-grid">
								<!-- header phone -->
								<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
<!-- 									<div class="impx-top-phone">
										<p><i class="fa fa-phone"></i> Phone : +62 123456789</p>  
									</div> -->
								</div>
								<!-- header phone end-->
								<!-- header social media -->
								<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
									<div class="impx-top-social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook-f"></i>Facebook</a></li>
											<li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
											<li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
										</ul>
									</div>
								</div>
								<!-- header social media end -->
							</div>

						</div>
					</div>
					<!-- Top Header End -->


					<div class="uk-container uk-container-expand">
						<div data-uk-grid>

							<!-- Header Logo -->
							<div class="uk-width-auto">
								<div class="impx-logo">
									<a href="index.html"><img src="images/logo.png" class="" alt="Logo"></a>
								</div>
							</div>
							<!-- Header Logo End-->

							<!-- Header Navigation -->
							<div class="uk-width-expand uk-position-relative">								
								<nav class="uk-navbar-container uk-navbar-transparent uk-visible@s uk-visible@m" data-uk-navbar>
									<div class="uk-navbar-right impx-navbar-right">
	        							<ul class="uk-navbar-nav impx-nav style2">
											<!-- Navigation Items -->
									    	<li class="uk-parent uk-active">
								    			<a href="index.html" class="uk-navbar-nav-subtitle"><div>Home<div class="uk-navbar-subtitle">Welcome</div></div></a>
									    	</li>
									    	<li>
									        	<a href="#H1" class="uk-navbar-nav-subtitle"><div>Hall<div class="uk-navbar-subtitle">Our Best Suites</div></div></a>
									        </li>
									        <li>
									        	<a href="restaurant.html"><div>Catering<div class="uk-navbar-subtitle">In-house Catering</div></div></a>
									        </li>
									        <li>
									        	<a href="index.html"><div><?php echo $_SESSION['Cust_name']; ?><div class="uk-navbar-subtitle">Customer</div></div></a>
									        </li>
									        <li>
									        	<a href="reservation.php"><div>Check Reservation<div class="uk-navbar-subtitle">Status</div></div></a>
									        </li>
									        <li>
									        	<a href="index.html"><div>Log Out<div class="uk-navbar-subtitle">Thank You</div></div></a>
									        </li>
									    </ul>
									    <!-- Navigation Items End -->
									</div>
								</nav>
							</div>
							<!-- Header Navigation End -->
						
							<!-- Promo Ribbon -->
							<div class="uk-width-auto uk-position-relative">
								<div class="ribbon">
								  <i><span><s></s>30% <span>Off!</span><s></s></span></i>
								</div>
							</div>
							<!-- Promo Ribbon End -->

						</div>
					</div>
				</div>
			</div>

		</header>
		<!-- HEADER END -->

		<!-- SLIDESHOW -->
		<div class="uk-container-expand">
			<div class="impx-slide-container style1">
				<div class="impx-slideshow-fw">

					<div data-uk-slideshow="autoplay: true; autoplay-interval: 6000; animation: fade; finite: false; min-height: 319; max-height: 980;">
						<div class="uk-position-relative uk-visible-toggle uk-light">

						    <ul class="uk-slideshow-items">
						    	<li><!-- Slideshow Item #1 -->
						    		<div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-center">
								    	<img src="images/slideshow/full-slide-1.jpg" alt="" data-uk-cover="height:319px">
								    	<div class="uk-overlay-primary uk-position-cover impx-overlay dark"></div>
									</div>
									<div class="uk-container uk-position-relative uk-height-1-1">
										<div class="uk-position-left uk-flex uk-flex-middle">
											<div class="impx-slide-fw-caption">
												<div class="impx-slide-fw-caption-outline uk-transition-slide-left"></div>
									    		<h1 class="uk-margin-remove impx-text-shadow uk-transition-slide-top uk-text-left">Hall Booking System</h1>
									    		<p class="impx-text-large impx-text-aqua uk-margin-remove impx-text-shadow uk-transition-slide-bottom uk-text-right uk-text-uppercase">Make Your Reservation Now</p>
								    		</div>
								    	</div>
							    	</div>
						    	</li><!-- Slideshow Item #1 End -->
						    	<li><!-- Slideshow Item #2 -->
						    		<div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-right">
								    	<img src="images/slideshow/full-slide-2.jpg" alt="" data-uk-cover>
								    	<div class="uk-overlay-primary uk-position-cover impx-overlay dark"></div>
								    </div>
								    <div class="uk-container uk-position-relative uk-height-1-1">
										<div class="uk-position-right uk-flex uk-flex-middle">
											<div class="impx-slide-fw-caption right">
												<div class="impx-slide-fw-caption-outline right bottom uk-transition-slide-left"></div>
									    		<h1 class="uk-margin-remove impx-text-shadow uk-transition-slide-top uk-text-right">Beautiful Place</h1>
									    		<p class="uk-text-large impx-text-aqua uk-margin-remove impx-text-shadow uk-transition-slide-bottom uk-text-right uk-text-uppercase">Enjoy the Best View</p>
								    		</div>
								    	</div>
							    	</div>
						    	</li><!-- Slideshow Item #2 End -->
						    	<li><!-- Slideshow Item #3 -->
						    		<div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
								    	<img src="images/slideshow/full-slide-3.jpg" alt="" data-uk-cover>
								    	<div class="uk-overlay-primary uk-position-cover impx-overlay dark"></div>
								    </div>
								    <div class="uk-container uk-position-relative uk-height-1-1">
										<div class="uk-position-left uk-flex uk-flex-middle">
											<div class="impx-slide-fw-caption text-right">
												<div class="impx-slide-fw-caption-outline uk-transition-slide-top"></div>
									    		<h1 class="impx-text-white uk-margin-remove impx-text-shadow uk-transition-scale-down">Luxurious &amp; Convenient</h1>
									    		<p class="uk-text-large impx-text-gold uk-margin-remove impx-text-shadow uk-transition-scale-up uk-text-right uk-text-uppercase">Choose The Best One</p>
								    		</div>
								    	</div>
							    	</div>
						    	</li><!-- Slideshow Item #3 End -->
						    	<li><!-- Slideshow Item #5 -->
						    		<div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-center">
								    	<img src="images/slideshow/full-slide-5.jpg" alt="" data-uk-cover>
								    	<div class="uk-overlay-primary uk-position-cover impx-overlay dark"></div>
							    	</div>
							    	<div class="uk-container uk-position-relative uk-height-1-1">
										<div class="uk-position-left uk-flex uk-flex-middle">
											<div class="impx-slide-fw-caption">
												<div class="impx-slide-fw-caption-outline uk-transition-slide-fade"></div>
									    		<h1 class="impx-text-white uk-margin-remove impx-text-shadow uk-transition-slide-bottom">In-house Catering</h1>
									    		<p class="uk-text-large impx-text-aqua uk-margin-remove impx-text-shadow uk-transition-slide-top uk-text-right uk-text-uppercase">The Delicious Foods</p>
								    		</div>
								    	</div>
							    	</div>
							    </li><!-- Slideshow Item #5 End -->
						    </ul>

						    <!-- Slideshow Nav -->
						    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
		        			<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
		        			<!-- Slideshow Nav End -->

		        		</div>
				    </div>

			    </div>
			</div>
		</div>
		<!-- SLIDESHOW END -->

        
		<!-- SERVICES LIST & BOOKING FORM -->
		<div class="impx-content impx-services style2 bg-color-aqua pattern-3">
			<div class="uk-container">

				<div class="uk-margin-medium-bottom impx-margin-bottom-small" data-uk-grid>
                            
					<!-- Services List -->
					<div class="impx-services-list uk-margin-bottom impx-margin-bottom-small">
						<h4 class="uk-heading-line uk-text-center uk-light uk-margin-bottom impx-text-white"><span>Our Services</span></h4>
						<div class="uk-child-width-1-4@xl uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2@s uk-grid-medium" data-uk-grid>
							<div><!-- Services Item #1 -->
						        <div class="uk-card uk-card-default uk-box-shadow-hover-xlarge impx-service-card uk-padding-bottom">
						        	<div class="uk-card-media-top">
						                <img src="images/hall.jpg" alt="">
						            </div>
						            <div class="uk-card-body uk-card-small uk-text-center">
						            	<div class="uk-card-badge uk-label uk-label-danger bg-color-aqua">Hall</div>
						            	<p>Don't Worry, We Have It!</p>
										<p>Make Your Reservation Now!</p>
						            	<a href="#" class="uk-button uk-button-default uk-button-small impx-button gold impx-button-outline outline-gold button-wide impx-button-rounded small-border">Learn More &raquo;</a>
						            </div>
						        </div>
						    </div><!-- Services Item #1 End -->
						    <div><!-- Services Item #2 -->
						        <div class="uk-card uk-card-default uk-box-shadow-hover-xlarge impx-service-card">
						        	<div class="uk-card-media-top">
						                <img src="images/catering.jpg" alt="">
						            </div>
						            <div class="uk-card-body uk-card-small uk-text-center">
						            	<div class="uk-card-badge uk-label uk-label-danger bg-color-aqua">Catering</div>
						            	<p>Food is our forte. People are our passion! Big enough to compete, small enough to care.</p>
						            	<a href="#" class="uk-button uk-button-default uk-button-small impx-button gold impx-button-outline outline-gold button-wide impx-button-rounded small-border">Learn More &raquo;</a>
						            </div>
						        </div>
						    </div><!-- Services Item #2 End -->
						    <div><!-- Services Item #3 -->
						        <div class="uk-card uk-card-default uk-box-shadow-hover-xlarge impx-service-card">
						        	<div class="uk-card-media-top">
						                <img src="images/facilities2.jpg" alt="">
						            </div>
						            <div class="uk-card-body uk-card-small uk-text-center">
						            	<div class="uk-card-badge uk-label uk-label-danger bg-color-aqua">Facilities</div>
						            	<p>Ready To Service Your Facilities.</p>
 										<P>Always There For You</P>
						            	<a href="#" class="uk-button uk-button-default uk-button-small impx-button gold impx-button-outline outline-gold button-wide impx-button-rounded small-border">Learn More &raquo;</a>
						            </div>
						        </div>
						    </div><!-- Services Item #3 End -->
						</div>
					</div>
					<!-- Services List End -->
				
				</div>
			</div>
		</div>

		<!-- SERVICES LIST & BOOKING FORM END -->
		<br>
		<!-- HALLS LIST -->
		<div id="H1">
		  <div class="impx-content impx-services style2 bg-color-gold pattern-3">
			<div class="impx-overlay dark"></div>

			<div class="uk-container">				
				<div class="uk-flex-center" data-uk-grid>
					<div class="uk-width-3-5@xl uk-width-3-5@l uk-width-3-4@m uk-width-1-1@s">

						<div class="impx-intro uk-text-center uk-position-relative uk-position-z-index"><!-- intro -->
							<br>
							<h2 class="impx-text-white uk-margin-remove-bottom">Find Our Best Halls &amp; Services</h2>
							<p class="impx-text-large uk-margin-remove-top uk-margin-medium-bottom impx-text-lighter">Booking Now!</p>
						</div><!-- intro end -->

					</div>
				</div>
			</div>

			<div class="uk-container uk-container-large">
				<!-- rooms items -->
				<div class="uk-position-relative impx-rooms-slider uk-position-relative" data-uk-slider="{center: true}">
					<ul class="uk-child-width-1-4@xl uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s impx-rooms uk-slider-items uk-grid-medium" data-uk-grid>
						<li><!-- rooms item #1 -->
							<a href="hallgold.php" class="uk-inline-clip uk-transition-toggle">
								<div class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge impx-service-card bg-color-aqua">
						        	<div class="uk-card-media-top">
						        		<div class="uk-position-relative">
							                <img src="images/rooms/room-square-1.jpg" alt="">
							                <div class="impx-overlay light overlay-squared padding-xwide"></div>
							            </div>
						                <div class="uk-card-body impx-padding-small uk-position-relative uk-position-z-index">
						                	<h6 class="uk-card-title uk-margin-remove-bottom impx-text-white">Gold Coast Grand Ballroom</h6>
						                	<div class=""></div>
							            </div>
						            </div>
						            <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary impx-overlay aqua-darkest">
						            	<p class="impx-text-white">Lot 44, Jalan Wakaf Utama, Off Jalan Tun Hamzah, 75450 Bukit Katil, Melaka, 75450 Melaka</p>
	                                    <ul class="uk-list room-fac impx-text-white">
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Value</li>
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Place</li>
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Facilities</li>
										</ul>
						        	</div>
						        </div>
					        </a>
						</li><!-- rooms item #1 end -->
						<li><!-- rooms item #2 -->
							<a href="hallmitc.php" class="uk-inline-clip uk-transition-toggle">
								<div class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge impx-service-card bg-color-aqua">
						        	<div class="uk-card-media-top uk-light">
						        		<div class="uk-position-relative">
							                <img src="images/rooms/room-square-6.jpg" alt="">
							                <div class="impx-overlay light overlay-squared padding-xwide"></div>
						                </div>
						                <div class="uk-card-body impx-padding-small uk-position-relative uk-position-z-index">
						                	<h6 class="uk-card-title uk-margin-remove-bottom impx-text-white">MITC Grand Ballroom</h6>
						                	<div class=""></div>
							            </div>
						            </div>
						            <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary impx-overlay aqua-darkest">
						            	<p class="impx-text-white">Level 2, Convention Centre,, Malacca International Trade Centre, 75450 Ayer Keroh, Malacca</p>
	                                    <ul class="uk-list room-fac impx-text-white">
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Value</li>
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Place</li>
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Facilities</li>
										</ul>
						        	</div>
						        </div>
					        </a>
						</li><!-- rooms item #2 end -->
						<li><!-- rooms item #3 -->
							<a href="hallbalai.php" class="uk-inline-clip uk-transition-toggle">
								<div class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge impx-service-card bg-color-aqua">
						        	<div class="uk-card-media-top uk-light">
						        		<div class="uk-position-relative">
							                <img src="images/rooms/room-square-2.jpg" alt="">
							                <div class="impx-overlay light overlay-squared padding-xwide"></div>
							            </div>
						                <div class="uk-card-body impx-padding-small uk-position-relative uk-position-z-index">
						                	<h6 class="uk-card-title uk-margin-remove-bottom impx-text-white">The Balairong Pokok Mangga</h6>
						                	<div class=""></div>
							            </div>
						            </div>
						            <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary impx-overlay aqua-darkest">
						            	<p class="impx-text-white">Plaza, Blok C, Jalan PPP3, Plaza, Pandan Perdana, 75250, Malacca</p>
	                                    <ul class="uk-list room-fac impx-text-white">
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Value</li>
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Place</li>
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Facilities</li>
										</ul>
						        	</div>
						        </div>
					        </a>
						</li><!-- rooms item #3 end -->
						<li><!-- rooms item #4 -->
							<a href="hallramada.php" class="uk-inline-clip uk-transition-toggle">
								<div class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge impx-service-card bg-color-aqua">
						        	<div class="uk-card-media-top uk-light">
						        		<div class="uk-position-relative">
							                <img src="images/rooms/room-square-3.jpg" alt="">
							                <div class="impx-overlay light overlay-squared padding-xwide"></div>
							            </div>
						                <div class="uk-card-body impx-padding-small uk-position-relative uk-position-z-index">
						                	<h6 class="uk-card-title uk-margin-remove-bottom impx-text-white">Hall Ramada Hotel Melaka</h6>
						                	<div class=""></div>
							            </div>
						            </div>
						            <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary impx-overlay aqua-darkest">
						            	<p class="impx-text-white">146, Jalan Hang Tuah, 75300 Melaka</p>
	                                    <ul class="uk-list room-fac impx-text-white">
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Value</li>
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Place</li>
											<li><span class="impx-text-white" data-uk-icon="icon: check; ratio: 1;"></span> Best Facilities</li>
										</ul>
						        	</div>
						        </div>
					        </a>
						</li><!-- rooms item #4 end -->					
					</ul>
					<!-- carousel nav -->
					<a class="uk-position-center-left uk-position-small uk-hidden-hover uk-light" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
					<a class="uk-position-center-right uk-position-small uk-hidden-hover uk-light" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
					<!-- carousel nav end -->
				</div>

				

			</div>
		</div>
		<!-- ROOMS CAROUSEL END -->
	    </div>
		<!-- ROOMS LIST END -->
		<!-- WHY CHOOSE US? -->
		<div class="impx-services style2 bg-color-aqua pattern-3">
			<div class="uk-container">

				<div class="uk-width-3-4@xl uk-width-3-4@l uk-width-1-1@m uk-width-1-1@s uk-margin-medium-top uk-position-relative uk-height-1-1 impx-features-content" data-uk-grid>

					<!-- Intro Text -->
					<div class="impx-intro uk-text-left">
						<h2 class="uk-margin-remove-bottom uk-margin-small-top">Why Choose Us?</h2>
						<p class="uk-margin-remove uk-text-uppercase">You can additional subtitle Here.</p>
					</div>
					<!-- Intro Text End -->
					<ul class="uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s impx-features-hl uk-grid-medium uk-grid-match uk-margin-top impx-margin-top-small" data-uk-grid>
						<li><!-- Reason Item #1 -->
					        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium color1 impx-feature-item uk-position-relative">
					        	<h6 class="uk-margin-remove-top uk-margin-bottom impx-text-white">Best Value</h6>
								<p class="uk-margin-remove  impx-text-lighter"> The food and service there is so good.</p>
								<span data-uk-icon="icon: users; ratio: 8" class="feature-icon"></span>
					        </div>
						</li><!-- Reason Item #1 End -->
						<li><!-- Reason Item #2 -->
							 <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium color2 impx-feature-item uk-position-relative">
								<h6 class="uk-margin-remove-top uk-margin-bottom impx-text-white">Services Priority</h6>
								<p class="uk-margin-remove impx-text-lighter">Our top priority is to offer you an unforgettable event.</p>
								<span data-uk-icon="icon: bell; ratio: 8" class="feature-icon"></span>
							</div>
						</li><!-- Reason Item #2 End -->
						<li><!-- Reason Item #3 -->
							<div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium color3 impx-feature-item uk-position-relative">
								<h6 class="uk-margin-remove-top uk-margin-bottom impx-text-white">Best Facilities</h6>
								<p class="uk-margin-remove impx-text-lighter">The Hall offers a any facilities like parking,mosque and Wifi Internet services.</p>
								<span data-uk-icon="icon: star; ratio: 8" class="feature-icon"></span>
							</div>
						</li><!-- Reason Item #3 End -->
						<li><!-- Reason Item #4 -->
							 <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium color4 impx-feature-item uk-position-relative">
								<h6 class="uk-margin-remove-top uk-margin-bottom impx-text-white">Satisfation Guarantee</h6>
								<p class="uk-margin-remove impx-text-lighter">Our work is guaranteed to the complete satisfaction of you, the customer.</p>
								<span data-uk-icon="icon: heart; ratio: 8" class="feature-icon"></span>
							</div>
						</li><!-- Reason Item #4 End -->
						<li><!-- Reason Item #5 -->
							 <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium color5 impx-feature-item uk-position-relative">
								<h6 class="uk-margin-remove-top uk-margin-bottom impx-text-white">Beatiful Panorama</h6>
								<p class="uk-margin-remove impx-text-lighter">Theme party in our beautiful locations.</p>
								<span data-uk-icon="icon: image; ratio: 8" class="feature-icon"></span>
							</div>
						</li><!-- Reason Item #5 End -->
						<li><!-- Reason Item #6 -->
							<div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium color6 impx-feature-item uk-position-relative">
								<h6 class="uk-margin-remove-top uk-margin-bottom impx-text-white">Enjoy Your Time</h6>
								<p class="uk-margin-remove impx-text-lighter">With us is a continual party! Theme party in our beautiful locations; to surprise you and make you live exciting moments to remember us forever.</p>
								<span data-uk-icon="icon: happy; ratio: 8" class="feature-icon"></span>
							</div>
						</li><!-- Reason Item #6 End -->
					</ul>
				</div>
			</div>
		</div>						
		
		<!-- FOOTER -->
		<footer id="impx-footer" class="impx-services style2 bg-color-dark">
			<div class="uk-container">

				<div class="uk-flex uk-flex-center data-uk-grid">
					<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-2-3@m">
						<div class="impx-footer-logo uk-align-center uk-text-center">
							<!-- Footer Logo -->
							<img src="images/logo.png" alt="" class="">
							<!-- Footer Note -->
							<p class="uk-margin-bottom"></p>							
							<!-- Site Copyright -->
							<!-- <p class="impx-copyright"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p> -->
						</div>
					</div>
				</div>
			</div>
			<!-- Scroll to Top -->
			<a href="#top" class="to-top fa fa-long-arrow-up" data-uk-scroll></a>
			<!-- Scroll to Top End -->
		</footer>
		<!-- FOOTER END -->

    	<!-- Javascript -->
    	<script src="js/jquery.js"></script>
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="js/jquery.gmap.min.js"></script>
        <script src="js/jquery.parallax.min.js"></script>
        <script src="js/template-config.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
</body>
</html>