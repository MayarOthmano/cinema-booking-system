<?php
 include("navbar.php"); 
session_start();

require_once("connection.php");
if($_SESSION['islogin']!=true){
    header("Location: login.php");
    exit;
    
}
$user_id = $_SESSION['user_id'];
$movie_id = $_POST['movie_id'];
$showtime_id = $_POST['showtime_id'];
$hall_id = $_POST['hall_id'];
$seats = explode(',', $_POST['seats']);
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// die;
$seat_names = $_POST['seat_names'];
$total_price = $_POST['total_price'];
$booking_code = uniqid('BOOK');

$sqlAddBooing = "INSERT INTO booking 
        (user_id, showtime_id, booking_code, total_price)
        VALUES 
        ('$user_id', '$showtime_id', '$booking_code', '$total_price')";

mysqli_query($conn, $sqlAddBooing);

$booking_id = mysqli_insert_id($conn);





// echo $booking_id; die;

    foreach ($seats as $seat) {

        $sql = "INSERT INTO `booking_seats`( `seat_id`, `booking_id`, `showtime_id`) 
                                     VALUES ('$seat','$booking_id','$showtime_id')";

        mysqli_query($conn, $sql);
    }


header("Location: success.php?booking_id=$booking_id");
exit;


?>