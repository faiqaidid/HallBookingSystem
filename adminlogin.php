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

	$select = mysqli_query($connect,"SELECT `owner_id`, `owner_name`, `owner_phone`, `Owner_password`, `owner_email` FROM `owner` WHERE owner_email= '$email' and Owner_password= '$psw' ") or die( mysqli_error($connect));
;
    $row= mysqli_fetch_array($select);

    if($row['owner_email'] == $email && $row['Owner_password'] == $psw)
    {
    	$_SESSION['owner_name'] = $row['owner_name'];
        $_SESSION['owner_id'] = $row['owner_id'];
        $_SESSION['owner_phone'] = $row['owner_phone'];
        $_SESSION['owner_password'] = $row['Owner_password'];
        $_SESSION['owner_email'] = $row['owner_email'];
        echo "<script>alert('Welcome Back Admin');</script>";
        include 'adminindex.php';

    }

    else{
    	echo "<script>
		alert('email or password wrong');
        window.location.href='index.html';
		</script>";
    }

}

?>