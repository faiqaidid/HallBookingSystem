<?php
if (!isset($_SESSION)) {
	session_start();
}

$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");

mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
<style>
* {
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 5px;
}

.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #444;
  color: white;
}

.fa {font-size:50px;}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <img src="images/user.png" alt="" class="" height="90" width="90">
      <a href="#">My App<br><?php echo ($_SESSION['owner_name']); ?></a>
    </header>
    <ul class="nav">
      <li>
        <a href="#cust1"><i class="zmdi zmdi-view-dashboard"></i>Dashboard</a>
      </li>
      <li>
        <a href="adminprofile.php">
          <i class="zmdi zmdi-link"></i> Profile
        </a>
      </li>
      <li>
        <a href="displaybook.php">
          <i class="zmdi zmdi-widgets"></i> Date Booking
        </a>
      </li>
      <li>
        <a href="index.html">
          <i class="zmdi zmdi-calendar"></i> Logout
        </a>
      </li>
  </div>

  <!-- Content -->
  <div id="content">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#"><i class="zmdi zmdi-notifications text-danger"></i>
            </a>
          </li>
          <li><a href="#"><?php echo ($_SESSION['owner_name']); ?></a></li>
        </ul>
      </div>
    </nav>
    <div></div>
    <div class="container-fluid">

    <h2  style="text-align: center;">Collect All Data Booking</h2>
    <p style="text-align: center;">Click Booking Date To Search Specific Your Hall.</p>
    <br>

      <div class="row">
        <div class="column">
          <div class="card">
            <p><i class="fa fa-user"></i></p>
                  <?php
      				$fetchquery = mysqli_query($connect,"SELECT COUNT(CUST_NAME) AS TOTAL FROM CUSTOMER") OR die( mysqli_error($connect));
      			 	$count=mysqli_fetch_assoc($fetchquery);
      			 	$num_rows=$count['TOTAL'];
      			 	echo "<h3>$num_rows+</h3>";
      			?>
            <p>Customers</p>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <p><i class="fa fa-check"></i></p>
            		<?php
      				$fetchquery = mysqli_query($connect,"SELECT COUNT(HALL_NAME) AS TOTAL FROM HALL") OR die( mysqli_error($connect));
      			 	$count=mysqli_fetch_assoc($fetchquery);
      			 	$num_rows=$count['TOTAL'];
      			 	echo "<h3>$num_rows+</h3>";
      			?>
            <p>Bookings</p>
          </div>
        </div>
        
        <div class="column">
          <div class="card">
            <p><i class="fa fa-smile-o"></i></p>
            <h3>100+</h3>
            <p>Happy Clients</p>
          </div>
        </div>
        
        <div class="column">
          <div class="card">
            <p><i class="fa fa-coffee"></i></p>
              <?php
              $fetchquery = mysqli_query($connect,"SELECT COUNT(CATERING_SET) AS TOTAL FROM CATERING") OR die( mysqli_error($connect));
              $count=mysqli_fetch_assoc($fetchquery);
              $num_rows=$count['TOTAL'];
              echo "<h3>$num_rows+</h3>";
            ?>
            <p>Order Catering</p>
          </div>
        </div>
    <br><br><br><br><br><br><br><br><br>

        <div id="barchart"></div>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
          // Load google charts
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          // Draw the chart and set the chart values
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Types Of Hall', 'Total'],
            <?php
            $sql ="SELECT COUNT(*) as total, Hall_name FROM Hall GROUP BY Hall_name";
            $count = mysqli_query($connect,$sql);
            while ($result = mysqli_fetch_assoc($count)) {
              echo "['".$result['Hall_name']."',".$result['total']."],";
              
            }
            ?>
          ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Average Types Of Booking', 'width':550, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.BarChart(document.getElementById('barchart'));
            chart.draw(data, options);
          }
          </script>

<style type="text/css">
div.p{
  position: absolute;
  top: 400px;
  left: 650px;
}
</style>
        <div id="piechart" class="p"></div>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
          // Load google charts
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          // Draw the chart and set the chart values
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Types Of Hall', 'Total'],
            <?php
            $sql ="SELECT COUNT(*) as total, Hall_name FROM Hall GROUP BY Hall_name";
            $count = mysqli_query($connect,$sql);
            while ($result = mysqli_fetch_assoc($count)) {
              echo "['".$result['Hall_name']."',".$result['total']."],";
            }
            ?>
          ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Average Types Of Booking', 'width':550, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
          }
          </script>
          <style type="text/css">
div.q{
  position: absolute;
  top: 800px;
}
</style>
        <div id="columnchart" class="q"></div>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
          // Load google charts
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          // Draw the chart and set the chart values
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Types Of Hall', 'Total'],
            <?php
            $sql ="SELECT SUM(AMOUNT) as total, booking_place FROM booking GROUP BY booking_place";
            $count = mysqli_query($connect,$sql);
            while ($result = mysqli_fetch_assoc($count)) {
              echo "['".$result['booking_place']."',".$result['total']."],";
            }
            ?>
          ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Total Sales', 'width':550, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
            chart.draw(data, options);
          }
          </script>
<style>
div.l{
  position: absolute;
  top: 800px;
  left: 650px;
}
</style>

          <div id="columnchart2" class="l"></div>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
          // Load google charts
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          // Draw the chart and set the chart values
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Types Of Status Booking', 'Total', { role: 'style' }],
            <?php
            $sql ="SELECT COUNT(STATUS_BOOKING) AS TOTAL FROM BOOKING WHERE STATUS_BOOKING = 'Completed';";
            $complete = mysqli_query($connect,$sql);
            $complete2 = mysqli_fetch_assoc($complete);

            $sql2 ="SELECT COUNT(STATUS_BOOKING) AS TOTAL_PROGRESS FROM BOOKING WHERE STATUS_BOOKING = 'Booked';";
            $progress = mysqli_query($connect,$sql2);
            $progress2 = mysqli_fetch_assoc($progress);
            ?>

            ['Completed',<?php echo $complete2['TOTAL']; ?>, 'red'],
            ['Booked',<?php echo $progress2['TOTAL_PROGRESS']; ?>, 'green'],
          ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Status Booking', 'width':550, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart2'));
            chart.draw(data, options);
          }
          </script>
</div>
    </div>

      <?php
        $query2 = mysqli_query($connect,"SELECT BOOKING_DATE FROM BOOKING") OR die( mysqli_error($connect));
      ?>
      <table class="">
        <?php
          while ($row = mysqli_fetch_array($query2)) {?>
            <tr>
              <form>
                <td><?php 

                      $today = strtotime(date('Y-m-d'));
                      $all = strtotime($row['BOOKING_DATE']);
                      if($today>$all) {
                      $diff = $all - $today;
                      $x = floor($diff / (60 * 60 * 24));
                      // echo $x."<br>"; 
                      $update = mysqli_query($connect,"UPDATE BOOKING SET STATUS_BOOKING = 'Completed' WHERE BOOKING_DATE = '".$row['BOOKING_DATE']."'");
                    }
                    else{
                      $diff = $all - $today;
                      $x = floor($diff / (60 * 60 * 24));
                      $update = mysqli_query($connect,"UPDATE BOOKING SET STATUS_BOOKING = 'Booked' WHERE BOOKING_DATE = '".$row['BOOKING_DATE']."'");
                      // echo $x."<br>"; 
                    }
                       ?>                      
                </td>              
              </form>
            </tr>
            <?php }
            ?>
        </table>
  
</body>
</html>