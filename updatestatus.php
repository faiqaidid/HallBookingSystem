<?php
$connect = mysqli_connect("localhost","root","") or die ("tidak boleh sambung pada mysql server");

mysqli_select_db($connect,"hallbookingsystem") or die ("tidak boleh sambung pada database");
?>

<?php
$query2 = mysqli_query($connect,"SELECT BOOKING_DATE FROM BOOKING") OR die( mysqli_error($connect));
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
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
