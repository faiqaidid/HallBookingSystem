<?php
function build_calendar($month,$year){

	$mysqli = new mysqli('localhost','root','','hallbookingsystem');
	$stmt = $mysqli->prepare("SELECT * FROM booking WHERE MONTH(booking_date) = ? AND YEAR(booking_date) = ? AND booking_place= ?");
	$place='MITC Melaka';
	$stmt->bind_param('sss',$month,$year,$place);
	$booking = array();
	if($stmt->execute()){
		$result = $stmt->get_result();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
				$booking[] = $row['booking_date'];
			}
			$stmt->close();
		}
	}

	$daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

	$firstDay0fMonth = mktime(0,0,0,$month,1,$year);

	$numberDays = date('t',$firstDay0fMonth);

	$dateComponents = getdate($firstDay0fMonth);

	$monthName = $dateComponents['month'];
	$dayOfWeek = $dateComponents['wday'];

	$dateToday = date('Y-m-d');

	$calendar = "<table class='table table-bordered'>";
	$calendar.= "<center><h2>$monthName $year</h2>";

	$calendar.="<a class='btn btn-xs btn-primary'href='?month=".date('m', mktime(0,0,0, $month- 1, 1, $year))."&year=".date('Y', mktime(0,0,0, $month-1, 1, $year))."'>Previous Month</a>";

	 $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
	

	$calendar.="<a class='btn btn-xs btn-primary'href='?month=".date('m', mktime(0,0,0,$month+1,1, $year))."&year=".date('Y', mktime(0,0,0,$month+1,1, $year))."'>Next Month</a></center><br>";
     
   

	foreach ($daysOfWeek as $day) {
		$calendar.= "<th class='header'>$day</th>";
	}
    $calendar.= "<tr>";
	$calendar.= "</tr><tr>";

	if($dayOfWeek > 0) {
		for ($k=0; $k <$dayOfWeek ; $k++) { 
			$calendar.= "<td></td>";
		}
	}

	$currentDay = 1;

	$month = str_pad($month,2,"0",STR_PAD_LEFT);

	while($currentDay <= $numberDays){


	    if ($dayOfWeek == 7) {
	    		$dayOfWeek = 0;
	    		$calendar.= "</tr><tr>";
	    	}	

		$currentDayRel = str_pad($currentDay, 2,"0",STR_PAD_LEFT);
		$date = "$year-$month-$currentDayRel";
        $dayname = strtolower(date('i', strtotime($date)));
        $evenNum = 0;
        $today = $date==date('Y-m-d')?"today":"";

        if($date<date('Y-m-d')){
        	$calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        }

        elseif (in_array($date,$booking)) {
        	$calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Already Booked</button>";
        }
        else{
        	$calendar.="<td class='$today'><h4>$currentDay</h4><a href ='updatecalendar2.php?date=".$date."' class='btn btn-success btn-xs' 'class='open-button' onclick='openForm()''>Book</a>";
        }

		$calendar.= "</td>";

		$currentDay++;
		$dayOfWeek++;
	}

	if($dayOfWeek != 7){
		$remainingDays = 7-$dayOfWeek;
		for ($i=0; $i < $remainingDays; $i++) { 
			$calendar.= "<td></td>";
		}
	}

	$calendar.= "</tr>";
	$calendar.= "</table>";

	echo $calendar;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	     <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no" />
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

        <!-- Site Properties -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">

        <!-- Google Fonts -->
       	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">
       	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/tiny-date-picker.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/media-query.css" />

</head>

<style>
table{
	table-layout: fixed;
}

td.{
	width:33%;
}

.today{
	background: yellow;
}
</style>

<body id="impx-body">

		<header id="impx-header" class="uk-box-shadow-small">

			<!-- Top Header -->
			<div class="impx-top-header bg-color-aqua">
				<div class="uk-container uk-container-center">
					
					<div class="uk-grid">
						<!-- header phone -->
						<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
							<div class="impx-top-phone">
								
							</div>
						</div><!-- header phone end -->
						<!-- header social media -->
						<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
							<div class="impx-top-social">
								<ul>
									<li><a href="#"><i class="fa fa-facebook-f"></i>Facebook</a></li>
									<li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
									<li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
								</ul>
							</div>
						</div><!-- header social media end -->
					</div>

				</div>
			</div>
			<!-- Top Header END -->

			<div class="impx-menu-wrapper uk-box-shadow-small style3 spa" data-uk-sticky="top: .impx-slide-container; animation: uk-animation-slide-top">

				<!-- Mobile Nav Start -->
				<div id="mobile-nav" data-uk-offcanvas="mode: push; overlay: true">
			        <div class="uk-offcanvas-bar">

			            <ul class="uk-nav uk-nav-default">
			                <li class="uk-parent">
			                	<a href="index.html">Home</a>
			                </li>
			                <li><a href="restaurant.html">Restaurant</a></li>
			            </ul>

			        </div>
			    </div>
			    <a href="#mobile-nav" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav" data-uk-toggle="target: #mobile-nav"><i class="fa fa-bars"></i>Menu</a>
	            <!-- Mobile Nav End -->
	            
				<div class="uk-container uk-container-expand">
					<div data-uk-grid>
						<div class="uk-width-expand impx-navbar-left">
							<nav class="uk-navbar-container uk-navbar-transparent uk-visible@s uk-visible@m" data-uk-navbar>
								<div class="uk-navbar-right">
									<!-- Header Menu Left Items Start -->
								    <ul class="uk-navbar-nav impx-nav">
								    	<!-- Header Menu Left Items Start -->
								    	<li class="uk-parent">
							    			<a href="index.html" class="uk-navbar-nav-subtitle"><div>Home<div class="uk-navbar-subtitle">Welcome</div></div></a>
								    	</li>
								    </ul>
								    <!-- Header Menu Left Items End -->
							    </div>
							</nav>
						</div>

						<!-- header logo -->
						<div class="uk-width-auto">
							<div class="impx-logo uk-margin-small-top">
								<a href="index.html"><img src="images/logo.png" class="" alt="Logo"></a>
							</div>
						</div>
						<!-- header logo end -->

						<div class="uk-width-expand">
							<nav class="uk-navbar-container uk-navbar-transparent uk-visible@s uk-visible@m" data-uk-navbar>
								<div class="uk-navbar-left">
									<!-- Header Menu Right Items Start -->
								    <ul class="uk-navbar-nav impx-nav">
								    	    <li><a href="restaurant.html"><div>Catering<div class="uk-navbar-subtitle">In-house Catering</div></div></a></li>
								    </ul>
								    <!-- Header Menu Right Items End -->
							    </div>
							</nav>
						</div>

					</div>
				</div>
			</div>
		</header>
		<br>
     <div class="container">
     	<div class="row">
     		<div class="col-md-12">
     			<?php 
     			$dateComponents = getdate();
     			if(isset($_GET['month'])&& isset($_GET['year'])){
     			$month = $_GET['month'];
     			$year = $_GET['year'];
     			}

     			else{
     				$month = $dateComponents['mon'];
     			$year = $dateComponents['year'];
     			}
     			echo build_calendar($month,$year);
     			?>
     		</div>
     		
     	</div>
     	
     </div>

        <script src="js/jquery.js"></script>
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="js/jquery.gmap.min.js"></script>
        <script src="js/jquery.parallax.min.js"></script>
        <script src="js/template-config.js"></script>

</body>
</html>