<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php 
$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");

mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");
?>

<?php
if (isset($_GET['date'])) {
	$date = $_GET['date'];
}

if (isset($_POST['submit'])) {

    $custid = $_SESSION['Cust_id'];

	$choose = $_POST['choose'];
	$guest = $_POST['guest'];
	$price = $_POST['price'];
	$totalprice = $guest * $price;

	$bookingname = 'GoldCoast Melaka';

	$hallname = 'BallRoom GoldCoast';
	$halladdress = 'GoldCoast Melaka';

	$ownerid = 'OW1';
	

	$sql2 = "INSERT INTO `hall`(`hall_name`, `hall_address`, `owner_id`) VALUES ('$hallname','$halladdress','$ownerid')";
	if(mysqli_query($connect,$sql2)){
		$hallid = mysqli_insert_id($connect);
	}

	$sql3 = "INSERT INTO `catering`(`catering_set`) VALUES ('$choose')";
	if(mysqli_query($connect,$sql3)){
		$cateringid = mysqli_insert_id($connect);
	}

	$sql4 = "INSERT INTO `booking`(`booking_place`, `booking_date`, `amount`, `pax`, `price_perpax`, `hall_id`, `cust_id`, `catering_id`) VALUES ('$bookingname','$date','$totalprice','$guest','$price','$hallid','$custid','$cateringid')";
	$compiled = mysqli_query($connect,$sql4);

	    echo "<script>
		alert('Booking Sucessfull');
		window.location.href='calendar.php';
		</script>";


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
	<link rel="stylesheet" href="/css/main.css">
<style>
body {
    font-family: 'Poppins', sans-serif;
    padding: 20px;
    background-color: #f4f4f4;
}

div.mm-dropdown {
  border: 1px solid #ddd;
  width: 100%;
  border-radius: 3px;
}

div.mm-dropdown ul {
  list-style: none;
  padding: 0;
  margin: 0;
  border: 0;
}

div.mm-dropdown ul li,
div.mm-dropdown div.textfirst {
  padding: 0;
  color: #333;
  border-bottom: 1px solid #ddd;
  padding: 5px 15px;
}

div.mm-dropdown div.textfirst img.down {
  float: right;
  margin-top: 5px;
}

div.mm-dropdown ul li:last-child {
  border-bottom: 0;
}

div.mm-dropdown ul li {
  display: none;
  padding-left: 25px;
}

div.mm-dropdown ul li.main {
  display: block;
}

div.mm-dropdown ul li img {
/*  width: 20px;
  height: 20px;*/
}
</style>
</head>
<body>

	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
		<div class="row w-100">
			<div class="col-md-8 col-lg-6 mx-auto">
				<h1 class="text-center">Book For Date:
					<?php
						echo date('m/d/Y', strtotime($date));
					?>
				</h1><hr>
				<?php	          
		          $id = $_SESSION['Cust_name'];
		          $result3 = mysqli_query($connect, "SELECT CUST_NAME, CUST_PHONE, CUST_EMAIL, CUST_PASS, GENDER FROM CUSTOMER WHERE CUST_NAME = '$id'");
		          while($row3 = mysqli_fetch_array($result3)) { 
		          $fname = $row3['CUST_NAME'];
		          $phone = $row3['CUST_PHONE'];
		          $email = $row3['CUST_EMAIL'];
		          $gender = $row3['GENDER'];
		          }
	          ?>
				<form action="" method="post" autocomplete="off">
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" name="name" class="form-control" value="<?php echo $fname ?>" readonly>		
					</div>

					<div class="form-group">
						<label for="">Gender</label><br>
						<input type="text" name="gender" class="form-control" value="<?php echo $gender ?>" readonly>		
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" class="form-control" value="<?php echo $email ?>" readonly>		
					</div>

					<div class="form-group">
						<label for="">Phone Number</label>
						<input type="tel" name="telephone" class="form-control" maxlength="11" value="<?php echo $phone ?>" readonly>		
					</div>

					<div class="form-group">
	                    <label for="value1">Price Per Pax</label>
	                    <input type="number" name="price" id="value1" class="form-control" min="0" placeholder="Enter first value" value="10.00" readonly>
                  	</div><br>

                  	<div class="form-group">
	                    <label for="value2">Total Guest</label>
	                    <input type="number" name="guest" id="value2" class="form-control" min="0" placeholder="Enter Total Guest" required>
                  	</div>

	                 <div class="form-group">
	                    <label for="sum">RM</label>
	                    <input type="number" name="sum" id="sum" class="form-control" readonly>
	                 </div>

					<div class="form-group">
						<label for="">Catering Set</label><br>
						<input type="radio" name="choose" value="SET A">SET A
  						<input type="radio" name="choose" value="SET B">SET B
  						<input type="radio" name="choose" value="SET C">SET C
					</div>

					<div class="mm-dropdown">
					  <div class="textfirst">MenuCatering<img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-128.png" width="10" height="10" class="down"></div>
					  <ul>
					    <li class="input-option" data-value="1">
					      <img src="images/MenuCatering.png" alt="" align="center" width="1100" height="500">
					  	</li>
					  </ul>
					</div><br>

					<button class="btn btn-primary btn-fill" type="submit" name="submit">Submit</button>
					<a class="btn btn-primary btn-fill" href="calendar3.php">Back</a>
					
				</form><br>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5lQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA712mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
	<script src="js/script.js"></script>
	<script src="js/script2.js"></script>

</body>
</html>
