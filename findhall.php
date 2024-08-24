<?php
$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");

mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");
?>


<?php
if (isset($_POST['search2'])) {

$dewan = $_POST['namadewan'];
$query2 = mysqli_query($connect,"SELECT HALL_NAME FROM HALL WHERE HALL_NAME LIKE '$dewan'") OR die( mysqli_error($connect));
$find = mysqli_fetch_array($query2);

 if($find['HALL_NAME'] == 'GrandBallRoom MITC')
 {
 	echo "<script>
		window.location.href='updatecalendarmitc.php';
		</script>";
 }

 elseif ($find['HALL_NAME'] ==  'BallRoom GoldCoast'){
 		echo "<script>
		window.location.href='updatecalendar.php';
		</script>";
 }

 elseif ($find['HALL_NAME'] ==  'Ramada Hall'){
 	    echo "<script>
		window.location.href='updatecalendarramada.php';
		</script>";
 }

  elseif ($find['HALL_NAME'] ==  'Balairong Banquet Hall'){
 	    echo "<script>
		window.location.href='updatecalendarbalai.php';
		</script>";
 }

}

?>