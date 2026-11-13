<?php
session_start();
require_once("connection.php");

if($_SESSION['islogin']!=true){
    header("Location: login.php");
    exit;
}


$movie_id=$_POST['movie_id'];
$showtime_id=$_POST['showtime_id'];
$seats=$_POST['seats'];

// var_dump($seats);
// die;
$hall_id=$_POST['hall_id'];

$sql = "SELECT * FROM hall WHERE hall_id='$hall_id'";
$hall = mysqli_query($conn, $sql);
$hall = mysqli_fetch_assoc($hall);

$sql = "SELECT * FROM movies WHERE movie_id='$movie_id'";
$movie = mysqli_query($conn, $sql);
$movie = mysqli_fetch_assoc($movie);

$sql = "SELECT * FROM showtime WHERE showtime_id='$showtime_id'";
$showtime = mysqli_query($conn, $sql);
$showtime = mysqli_fetch_assoc($showtime);

$seat_ids = implode(",", $seats);
$sql = "SELECT * FROM seats WHERE seat_id IN ($seat_ids)";
$result = mysqli_query($conn, $sql);

$total_price=$showtime['ticket_price']*count($seats);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/confirmbooking.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
  
</head>
  <body>
    <?php include("navbar.php"); ?>
    <div class="container">

        
           
            <h1>Confirm Booking</h1>
       
        <div class="movie-info-container">
            <div class="movie-info">
                
               <h3> <?php echo $movie['title']; ?></h3>
               <h3>Time : <?php echo $showtime['show_time']; ?></h3>
               <h3>Hall : <?php echo $hall['hall_name']; ?></h3>
               <h3>Date : <?php echo $showtime['show_date']; ?></h3>
                <?php
                    $seat_names = array();
                    while ($seat = mysqli_fetch_assoc($result)) {
                        $seat_names[] = $seat['seat_name'];
                    }
                ?>
            
       
                <h3>Seats: <?php echo implode(' ', $seat_names); ?></h3>
                <h3 class="total-price">Total Price: <?php echo $total_price; ?></h3>
           
            <form method="POST" action="savebooking.php">
                <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
                <input type="hidden" name="showtime_id" value="<?php echo $showtime_id; ?>">
                <input type="hidden" name="hall_id" value="<?php echo $hall_id; ?>">
                <input type="hidden" name="seats" value="<?php echo implode(',', $seats); ?>">
                <input type="hidden" name="seat_names" value="<?php echo implode(',', $seat_names); ?>">
                <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                <button type="submit">Confirm Booking</button>
            </form>
            </div>
        </div>
    
</div>
<?php require("footer.php");?>



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>