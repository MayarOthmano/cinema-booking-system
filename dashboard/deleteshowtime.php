<?php
require_once '../connection.php';
session_start();
$showtime_id = $_GET['showtime_id'];
$sql = "UPDATE showtime SET status='unavailable' WHERE showtime_id = '$showtime_id'";

if (mysqli_query($conn, $sql)) {
    header("Location: showtime.php");
    exit();
} else {
    echo "Error deleting showtime: " . mysqli_error($conn);
}
?>