<?php
if (!isset($_SESSION)) {
  session_start();
}

$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");

mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");

?>

<?php
if(isset($_POST['update'])){

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password= $_POST['pass'];


  $update = mysqli_query($connect,"UPDATE OWNER
  SET owner_name = '" .$_POST["name"]. "',owner_phone = '" .$_POST["phone"]. "',owner_email ='" .$_POST["email"]. "',owner_password = '".$_POST["pass"]. "' WHERE OWNER_NAME = '".$_SESSION["owner_name"]."' ");
  echo "<script>alert('Update Successfully');
  window.location.href='adminprofile.php'</script>";
        ;


}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'><link rel="stylesheet" href="css/admin.css" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        <a href="#">
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
      <div class="container-fluid">
        <?php
          
          $id=$_SESSION['owner_name'];
          $result3 = mysqli_query($connect,"SELECT OWNER_NAME,OWNER_PHONE,OWNER_EMAIL,OWNER_PASSWORD FROM OWNER where OWNER_NAME ='$id'");
          while($row3 = mysqli_fetch_array($result3))
          { 
          $fname=$row3['OWNER_NAME'];
          $phone=$row3['OWNER_PHONE'];
          $email=$row3['OWNER_EMAIL'];
          $pass=$row3['OWNER_PASSWORD'];
          }
          ?>
      </div>
    </div>
<style type="text/css">
div.p{
  position: absolute;
  top: 100px;
  left: 600px;
  width: 30%;

}
</style>
<div class="w3-container p">
  <div class="w3-card-4 form-card">
    <header class="form-header">
      <h1>Profile</h1>
    </header>

    <div class="w3-container">
      <br>
      <form action="adminprofile.php" method="post">
        <table class="form-table">
          <tr>
            <td><div align="left">Full Name:</div></td>
            <td><input type="text" name="name" value="<?php echo $fname ?>" ></td>
          </tr>
          <tr>
            <td><div align="left">Phone Number:</div></td>
            <td><input type="text" name="phone" value="<?php echo $phone ?>"></td>
          </tr>
          <tr>
            <td><div align="left">Email:</div></td>
            <td><input type="email" name="email" value="<?php echo $email ?>"></td>
          </tr>
          <tr>
            <td><div align="left">Password:</div></td>
            <td><input type="password" name="pass" value="<?php echo $pass ?>"></td>
          </tr>
        </table>
        <br>
        <button class="btn btn-primary btn-fill" type="submit" name="update">UPDATE PROFILE</button>
      </form>
    </div>
  </div>
</div>

<style>
  .form-card {
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    padding: 20px;
    max-width: 100%;
    margin: 0 auto;
  }

  .form-header {
    background-color: #f8f9fa;
    padding: 10px;
    border-bottom: 1px solid #e9ecef;
    text-align: center;
  }

  .form-header h1 {
    font-size: 1.5em;
    font-weight: 600;
    color: #343a40;
    margin: 0;
  }

  .form-table {
    width: 100%;
    margin: 20px 0;
  }

  .form-table td {
    padding: 8px;
  }

  .form-table input[type="text"], .form-table input[type="email"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
  }

  .btn-primary {
    background-color: #6c757d;
    border-color: #6c757d;
    width: 100%;
    padding: 10px;
    font-size: 1em;
  }

  .btn-primary:hover {
    background-color: #5a6268;
    border-color: #545b62;
  }
</style>



  </div>
</div>
<!-- partial -->
  
</body>
</html>
