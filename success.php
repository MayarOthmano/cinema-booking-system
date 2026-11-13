<?php


require_once __DIR__ . '/vendor/autoload.php';
use chillerlan\QRCode\QRCode;






 include("navbar.php"); 
session_start();
require_once("connection.php");
if($_SESSION['islogin']!=true){
    header("Location: login.php");
    exit;
}
$booking_id=$_GET['booking_id'];
$sql = "SELECT * FROM booking WHERE booking_id='$booking_id'";
$booking = mysqli_query($conn, $sql);
$booking = mysqli_fetch_assoc($booking);

$sql = "SELECT * FROM showtime WHERE showtime_id='".$booking['showtime_id']."'";
$showtime = mysqli_query($conn, $sql);
$showtime = mysqli_fetch_assoc($showtime);

$sql = "SELECT * FROM hall WHERE hall_id='".$showtime['hall_id']."'";
$hall = mysqli_query($conn, $sql);
$hall = mysqli_fetch_assoc($hall);

$sql = "SELECT * FROM movies WHERE movie_id='".$showtime['movie_id']."'";
$movie = mysqli_query($conn, $sql);
$movie = mysqli_fetch_assoc($movie);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/success.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Success</title>
</head>

<body class="success-page">
    <div class="success-icon">
        ✓ 
    </div>
    <h1>Booking Successful</h1>
    <p class="success-message">
        Your booking has been confirmed successfully.
    </p>
    <div class="booking-card">
        <h2>Booking Details</h2>
        <div class="boking-info">
            <div class="info-row">
               
            </div>
            <div class="info-row ">
                <h3>Movie: <span><?php echo $movie['title']; ?></span></h3>
            </div>
            <div class="info-row">
                <h3>Date:<span> <?php echo $showtime['show_date']; ?></span></h3>
            </div>
            <div class="info-row">
                <h3>Time: <span><?php echo $showtime['show_time']; ?></span></h3>
            </div>
            <div class="info-row">
                <h3>Hall:<span> <?php echo $hall['hall_name']; ?></span></h3>
            </div>
            <div class="info-row total">
                <h3>Total Price: <span><?php echo $booking['total_price']; ?></span> JOD</h3>
            </div>
            <div class="info-row" style="margin-top: 20px; align-items: center;">
           <?php $data =  $booking['booking_code']; 
                        // quick and simple:
                        echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code"  width="200" height="200 style=""" />';
                        ?>
                        <a href="index.php" class="home-btn">Home</a>
                    </div>
        </div>
    </div>
</div>


    <?php require("footer.php");?>
</body>
</html>     
