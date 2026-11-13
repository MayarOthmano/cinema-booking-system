<?php
require_once '../connection.php';
session_start();
$movie_id = $_GET['movie_id'];
$sql = "UPDATE movies SET status='inactive' WHERE movie_id = '$movie_id'";

if (mysqli_query($conn, $sql)) {
    echo "Movie deleted successfully.";
    header("Location: movie.php");
    exit();
} else {
    echo "Error deleting movie: " . mysqli_error($conn);
}
?>