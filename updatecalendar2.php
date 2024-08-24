<?php
if (isset($_GET['date'])) {
	$date = $_GET['date'];
}

if (isset($_POST['submit'])) {


	$id = $_POST['id'];

	$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");
	mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");

    $select = mysqli_query($connect,"SELECT BOOKING_ID FROM BOOKING WHERE BOOKING_ID = '$id'") or die( mysqli_error($connect));
;
    $row= mysqli_fetch_array($select);

    if($row['BOOKING_ID']== $id)
    {
    	$update = mysqli_query($connect,"UPDATE BOOKING SET booking_date= '$date' WHERE BOOKING_ID = '$id'");
        echo "<script>alert('Update Successfully');
         window.location.href='test.php';</script>";

    }

    else{
    	echo "Something Wrong With Your Data";
    }

}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="BVYiiSlFeK1dGmJRAkyculHAHRg32OmUcww7on3RYdg4Va%2BPmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/main.css">
</head>
<style>
select:disabled {
  background: #dddddd;
}
</style>
<body>

	<div class="container">
		<h1 class="text-center">Update Date:
			<?php
				echo date('m/d/Y',strtotime($date));
			?>
		</h1><hr>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="post" autocomplete="off">
<!-- 					<div class="form-group">
						<label for="">Name</label>
						<input type="text" name="name" class="form-control" required>		
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" class="form-control" required>		
					</div> -->
					<div class="form-group">
						<label for="">Booking ID</label>
						<input type="text" name="id" class="form-control" required>		
					</div>
					<button class="btn btn-primary btn-fill" type="submit" name="submit">Submit</button>

					<a class="btn btn-primary btn-fill" type="submit" name="back"href = "calendar.php">Back</a>
					
				</form>
			</div>
			
		</div>
		
	</div>

<script>
function disableBtn() {
  document.getElementById("myBtn").disabled = true;
}

function enableBtn() {
  document.getElementById("myBtn").disabled = false;
}
</script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5lQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA712mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>