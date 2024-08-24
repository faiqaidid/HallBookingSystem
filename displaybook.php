<?php
if (!isset($_SESSION)) {
	session_start();
}

$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");

mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");

?>
<?php
  if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $padam= $sql = mysqli_query($connect,"DELETE FROM BOOKING WHERE BOOKING.BOOKING_ID = '$delete_id' ") OR die( mysqli_error($connect));
    $padam3= $sql = mysqli_query($connect,"DELETE FROM HALL WHERE HALL.HALL_ID = '$delete_id' ") OR die( mysqli_error($connect));
    $padam4= $sql = mysqli_query($connect,"DELETE FROM CATERING WHERE CATERING.CATERING_ID = '$delete_id' ") OR die( mysqli_error($connect));

    echo "<script>
    alert('Delete Successfull');
    window.location.href='displaybook.php';
    </script>";
  }
  
?>




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

  <style>
			body
			* {box-sizing: border-box;font-family: 'Poppins', sans-serif;}
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
        <a href="adminindex.php"><i class="zmdi zmdi-view-dashboard"></i>Dashboard</a>
      </li>
      <li>
        <a href="adminprofile.php">
          <i class="zmdi zmdi-link"></i> Profile
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-widgets"></i> Date Booking
        </a>
      </li>
      <li>
        <a href="index.html">
          <i class="zmdi zmdi-calendar"></i> Logout
        </a>
      </li>
    </ul>
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
    <style type="text/css">
      div.p{
        position: absolute;
        top: 40px;
        left: 550px;
      }
    </style>
    <div class="container-fluid">
    	<div class="row">
           <?php
            if (isset($_POST['search'])) {
           	  $searchkey = $_POST["search"];          
			        $fetchquery = mysqli_query($connect,"SELECT BOOKING_ID,BOOKING.CUST_ID,CUST_NAME,CUST_EMAIL,CUST_PHONE,HALL.HALL_ID,HALL_NAME,HALL_ADDRESS,BOOKING_DATE,STATUS_BOOKING FROM CUSTOMER,HALL INNER JOIN BOOKING WHERE CUSTOMER.CUST_ID = BOOKING.CUST_ID AND HALL.HALL_ID = BOOKING.HALL_ID AND HALL_NAME LIKE '%$searchkey%'")OR die( mysqli_error($connect));
              }

            elseif (isset($_POST['status'])) {
              $statuskey = $_POST["status"];          
              $fetchquery = mysqli_query($connect,"SELECT BOOKING_ID,BOOKING.CUST_ID,CUST_NAME,CUST_EMAIL,CUST_PHONE,HALL.HALL_ID,HALL_NAME,HALL_ADDRESS,BOOKING_DATE,STATUS_BOOKING FROM CUSTOMER,HALL INNER JOIN BOOKING WHERE CUSTOMER.CUST_ID = BOOKING.CUST_ID AND HALL.HALL_ID = BOOKING.HALL_ID AND STATUS_BOOKING LIKE '%$statuskey%'")OR die( mysqli_error($connect));
              }

			     else{
				      $fetchquery = mysqli_query($connect,"SELECT BOOKING_ID,BOOKING.CUST_ID,CUST_NAME,CUST_EMAIL,CUST_PHONE,HALL.HALL_ID,HALL_NAME,HALL_ADDRESS,BOOKING_DATE,STATUS_BOOKING FROM CUSTOMER,HALL INNER JOIN BOOKING WHERE CUSTOMER.CUST_ID = BOOKING.CUST_ID AND HALL.HALL_ID = BOOKING.HALL_ID")OR die( mysqli_error($connect));
				        $statuskey = "";
                $searchkey = "";

			         }
			     ?>

    		<form action="displaybook.php" method="post">
    			<div class="col-md-6">
            <div class="p"><button class="btn" name="submit">Search</button></div>
                <select class="form-control" name="search">
                   <option name="search" value="">Search Hall</option> 
                   <option name="search" value="GrandBallRoom MITC">GrandBallRoom MITC</option> 
                   <option name="search" value="BallRoom GoldCoast"> BallRoom GoldCoast</option> 
                   <option name="search" value="Ramada Hall">Ramada Hall</option> 
                   <option name="search" value="Balairong Banquet Hall">Balairong Banquet Hall</option>
                </select><br>           
    			</div>
    		</form>
        <form action="displaybook.php" method="post">
          <div class="col-md-6">
            <div class="p"><button class="btn" name="submit">Search</button></div>
                <select class="form-control" name="status">
                   <option name="search" value="">Status Booking</option> 
                   <option name="search" value="Booked">Booked</option> 
                   <option name="search" value="Completed">Completed</option> 
                </select><br>              
          </div>
        </form>
    	</div>
        <br><div class="content mt-3" id="cust1">
       	    <div class="col-md-12">
      			 <table class="table table-condensed table-bordered" style="font-size: 12px;">
      				<tr>
      					<th style="background-color: gray;">No</th>
      					<th style="background-color: gray;">Name</th>
      					<th style="background-color: gray;">Email</th>
                <th style="background-color: gray;">Telephone</th>
      					<th style="background-color: gray;">Hall Name</th>
      					<th style="background-color: gray;">Location</th>
      					<th style="background-color: gray;">Date</th>
                <th style="background-color: gray;">Status</th>
                <th style="background-color: gray;">DELETE</th>
      				</tr>
      				<?php
      				$sr = 1;
      					while ($row = mysqli_fetch_array($fetchquery)) {?>
      						<tr>
      							<form>
      								<td><?php echo $sr; ?></td>
      								<td><?php echo $row['CUST_NAME']; ?></td>
      								<td><?php echo $row['CUST_EMAIL']; ?></td>
                      <td><?php echo $row['CUST_PHONE']; ?></td>
      								<td><?php echo $row['HALL_NAME']; ?></td>
      								<td><?php echo $row['HALL_ADDRESS']; ?></td>
      								<td><?php echo $row['BOOKING_DATE']; ?></td>
                      <td><?php 
                                if($row['STATUS_BOOKING'] =='Booked'){
                                   echo "<button class='btn btn-success btn-xs'>".$row['STATUS_BOOKING']."</button>" ;
                                }

                                else{
                                  echo "<button class='btn btn-danger btn-xs'>".$row['STATUS_BOOKING']."</button>";
                                } 
                                ?></td>
                      <td><a href="displaybook.php?delete=<?php echo $row['BOOKING_ID'] ?>" class='btn btn-danger btn-xs' onclick="return confirm('Are you Sure');" >DELETE</a></td>
      							</form>
      						</tr>
      						<?php $sr++;}
      						?>
      			    </table>
	          </div>
        </div>
    </div>

  
  </div>
</div>
<!-- partial -->
  
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