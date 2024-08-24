<?php
// Database connection
$connect = mysqli_connect("localhost", "root", "", "hallbookingsystem") or die("Could not connect to MySQL server");

// Check if booking_id is set in URL
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    
    // Fetch booking details
    $query = "SELECT CUST_EMAIL, CUST_NAME, BOOKING.BOOKING_ID, HALL_NAME, BOOKING_DATE, PAX, PRICE_PERPAX, AMOUNT, CATERING_SET 
              FROM CUSTOMER 
              INNER JOIN BOOKING ON CUSTOMER.CUST_ID = BOOKING.CUST_ID 
              INNER JOIN HALL ON HALL.HALL_ID = BOOKING.HALL_ID 
              INNER JOIN CATERING ON CATERING.CATERING_ID = BOOKING.CATERING_ID 
              WHERE BOOKING.BOOKING_ID = '$booking_id'";
    
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("No invoice found for this booking ID.");
    }
} else {
    die("Booking ID is required.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice - Booking ID <?php echo htmlspecialchars($row['BOOKING_ID']); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            .print-container, .print-container * {
                visibility: visible;
            }
            .print-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 20mm;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Invoice - Booking ID <?php echo htmlspecialchars($row['BOOKING_ID']); ?></h1>
        <div class="invoice-box print-container">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="images/logo.png" style="width:100%; max-width:200px;">
                                </td>
                                <td>
                                    Invoice #: <?php echo htmlspecialchars($row['BOOKING_ID']); ?><br>
                                    Created: <?php echo date('Y-m-d'); ?><br>
                                    Booking date: <?php echo htmlspecialchars($row['BOOKING_DATE']); ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Hall Booking System<br>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row['CUST_NAME']); ?><br>
                                    <?php echo htmlspecialchars($row['CUST_EMAIL']); ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>Item</td>
                    <td>Details</td>
                </tr>
                <tr class="item">
                    <td>Total Guest</td>
                    <td><?php echo htmlspecialchars($row['PAX']); ?></td>
                </tr>
                <tr class="item">
                    <td>Price Per Pax</td>
                    <td>RM <?php echo htmlspecialchars($row['PRICE_PERPAX']); ?></td>
                </tr>
                <tr class="item last">
                    <td>Catering set</td>
                    <td><?php echo htmlspecialchars($row['CATERING_SET']); ?></td>
                </tr>
                <tr class="total">
                    <td></td>
                    <td>Total: RM <?php echo htmlspecialchars($row['AMOUNT']); ?></td>
                </tr>
            </table>
        </div>
        <a class="btn btn-secondary mt-4" href="reservation.php">Back to Booking List</a>
        <button class="btn btn-primary mt-4" onclick="window.print();">Print Invoice</button>
    </div>
</body>
</html>
