<?php
$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");

mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");
?>
<?php
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$pswd = $_POST['pswd'];
	$emailcheck = $email;

	$emailcheck2 = mysqli_query($connect,"SELECT * FROM CUSTOMER WHERE CUST_EMAIL = '$emailcheck'");

	if(mysqli_num_rows($emailcheck2)> 0){
		echo "<script>
		alert('Email Already Exist');
		window.location.href='index.html';
		</script>";
	}

	else{	
    $sql = "INSERT INTO `customer`(`Cust_name`, `Cust_email`, `cust_phone`, `gender`,`cust_pass`) VALUES ('$name','$email','$telephone','$gender','$pswd')";
	// $compiled = mysqli_query($connect,$sql);

	if(mysqli_query($connect,$sql)){
		$custid = mysqli_insert_id($connect);
		
		}
		echo "<script>alert('Register Successfully');
		window.location.href='index.html';</script>";
	}


?>
