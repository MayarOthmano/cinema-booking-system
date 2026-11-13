<?php
include '../connection.php';
session_start();
$sql="SELECT * FROM booking";
$result = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.datatables.net/v/dt/dt-3.1.4/e-3.1.1/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-3.1.4/e-3.1.1/datatables.min.js" ></script>
    <link rel="stylesheet" href="../css/bookingdash.css">
</head>
<body>
    <div class="container">
        <h1>Booking List</h1>
    <table id="booking">
        <thead>
            <tr>
                <th>booking_id</th>
                <th>user_id</th>
                <th>showtime_id</th>
                <th>booking code</th>
                <th>total_price</th>
                <th>booking date</th>
                <th>status</th>
                <th>status of ticket</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['showtime_id']; ?></td>
                    <td><?php echo $row['booking_code']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['bookig_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['statusofticket']; ?></td>
                </tr>
            <?php } ?>
        </tbody>


    </table>
</div>
    <script>
        new DataTable('#booking',{
            order: [[0, 'asc']],
            pageLength: 10,
            searching: true,
            paging: true,


            
        })
    </script>
    
</body>
</html>