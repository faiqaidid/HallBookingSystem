<?php
$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");

mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");

?>


<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$psw = $_POST['psw'];

	$select = mysqli_query($connect,"SELECT `Cust_id`, `Cust_name`, `Cust_email`, `cust_phone`, `cust_pass`, `gender` FROM `customer` WHERE Cust_email= '$email' and cust_pass= '$psw' ") or die( mysqli_error($connect));
;
    $row= mysqli_fetch_array($select);

    if($row['Cust_email'] == $email && $row['cust_pass'] == $psw)
    {
    	$_SESSION['Cust_name'] = $row['Cust_name'];
        $_SESSION['Cust_id'] = $row['Cust_id'];
        $_SESSION['cust_phone'] = $row['cust_phone'];
        $_SESSION['Cust_pass'] = $row['cust_pass'];
        $_SESSION['Cust_email'] = $row['Cust_email'];
        echo "<script>alert('Make Your Reservation');
        window.location.href='index.php';</script>";
    }

    else{
    	echo "<script>
		alert('email or password wrong');
        window.location.href='index.html';
		</script>";
    }

}

?>