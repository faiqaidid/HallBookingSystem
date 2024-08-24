<?php
// Database connection
$connect = mysqli_connect("localhost", "root", "", "hallbookingsystem") or die("tidak boleh sambung pada mysql server");

// Start session
if (!isset($_SESSION)) {
    session_start();
}

// Get customer name from session
$n = $_SESSION['Cust_name'];

// Query to fetch booking details
$emailcheck2 = mysqli_query($connect, "SELECT CUST_EMAIL, CUST_NAME, BOOKING.BOOKING_ID, HALL_NAME, BOOKING_DATE, PAX, PRICE_PERPAX, AMOUNT, CATERING_SET 
    FROM CUSTOMER 
    INNER JOIN BOOKING ON CUSTOMER.CUST_ID = BOOKING.CUST_ID 
    INNER JOIN HALL ON HALL.HALL_ID = BOOKING.HALL_ID 
    INNER JOIN CATERING ON CATERING.CATERING_ID = BOOKING.CATERING_ID 
    WHERE CUST_NAME LIKE '%$n%'") or die(mysqli_error($connect));

// Initialize results_available
$results_available = false;

// Check if query was successful and if there are results
if ($emailcheck2) {
    if (mysqli_num_rows($emailcheck2) > 0) {
        $results_available = true;
        $fetchquery = $emailcheck2; // Assign to $fetchquery for use in the HTML
    }
} else {
    die("Error executing query: " . mysqli_error($connect));
}

// Handle delete operation
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $padam = mysqli_query($connect, "DELETE FROM BOOKING WHERE BOOKING_ID = '$delete_id'") or die(mysqli_error($connect));
    $padam3 = mysqli_query($connect, "DELETE FROM HALL WHERE HALL_ID = '$delete_id'") or die(mysqli_error($connect));
    $padam4 = mysqli_query($connect, "DELETE FROM CATERING WHERE CATERING_ID = '$delete_id'") or die(mysqli_error($connect));

    echo "<script>
    alert('Delete Successfull');
    window.location.href='test.php';
    </script>";
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Booking Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .table th, .table td {
            padding: 12px;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
            color: #495057;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .modal-header {
            background-color: #343a40;
            color: white;
        }

        .modal-content {
            border-radius: 8px;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
        }

        .modal-body select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        .print-container {
            display: none;
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

        .modal-header {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
        <h1 class="text-center mb-4">Booking Details</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Hall Name</th>
                    <th>Booking ID</th>
                    <th>Date</th>
                    <th>Delete Booking</th>
                    <th>Update Date</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($results_available): ?>
                    <?php $sr = 1; while ($row = mysqli_fetch_array($fetchquery)): ?>
                        <tr>
                            <td><?php echo $sr; ?></td>
                            <td><?php echo htmlspecialchars($row['CUST_NAME']); ?></td>
                            <td><?php echo htmlspecialchars($row['HALL_NAME']); ?></td>
                            <td><?php echo htmlspecialchars($row['BOOKING_ID']); ?></td>
                            <td><?php echo htmlspecialchars($row['BOOKING_DATE']); ?></td>
                            <td>
                                <a href="test.php?delete=<?php echo urlencode($row['BOOKING_ID']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                            </td>
                            <td>
                                <!-- Unique modal ID for each booking -->
                                <a class="btn btn-info btn-sm" href="invoice.php?booking_id=<?php echo htmlspecialchars($row['BOOKING_ID']); ?>">
                                    <i class="fa fa-file-text"></i> Invoice
                                </a>
                            </td>
                        </tr>
                    <?php $sr++; endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8">No records found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
</div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Calendar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="findhall.php" method="post">
                        <div class="form-group">
                            <label for="hallName">Hall Name</label>
                            <select class="form-control" id="hallName" name="namadewan">
                                <option value="GrandBallRoom MITC">GrandBallRoom MITC</option>
                                <option value="BallRoom GoldCoast">BallRoom GoldCoast</option>
                                <option value="Ramada Hall">Ramada Hall</option>
                                <option value="Balairong Banquet Hall">Balairong Banquet Hall</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="search2">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-info btn-lg" href="index.php">Back</a>

     <!-- Include Bootstrap JS and jQuery -->
     <!-- Include your scripts at the end of the body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
