<?php
session_start();
require_once("connection.php");
if($_SESSION['islogin']!=true){
    header("Location: login.php");
    exit;
}



$id = $_GET['movie_id'];

// ليشششششش
$sql = "SELECT * FROM movies WHERE movie_id='$id'";
$movie = mysqli_query($conn, $sql);
$movie = mysqli_fetch_assoc($movie);


$sql = "SELECT * FROM showtime WHERE movie_id='$id'";
$showtime = mysqli_query($conn, $sql);




if(isset($_GET['showtime_id'])){

    $showtime_id = $_GET['showtime_id'];
    $sql = "SELECT * FROM showtime WHERE showtime_id='$showtime_id'";
    $result = mysqli_query($conn, $sql);
    $selected_showtime = mysqli_fetch_assoc($result);
    
    $hall_id=$selected_showtime['hall_id'];

    
    $sql = "SELECT * FROM seats WHERE hall_id='$hall_id'";
    $seats = mysqli_query($conn, $sql);


    $sql = "SELECT seat_id 
        FROM booking_seats 
        WHERE showtime_id='$showtime_id'";

        $booked_result = mysqli_query($conn, $sql);

        $booked_seats = [];

        while ($row = mysqli_fetch_assoc($booked_result)) {
            $booked_seats[] = $row['seat_id'];
        }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
 
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">

    
</head>
<body>
    <?php include("navbar.php"); ?>
    <div class="container">

        <h1>Available Showtimes</h1>

        <div class="showtime">

            <?php while($showtimeresult = mysqli_fetch_assoc($showtime)){ ?>

                <div class="details">

                    <p>
                        <span>Date</span>
                        <?php echo $showtimeresult['show_date']; ?>
                    </p>

                    <p>
                        <span>Time</span>
                        <?php echo $showtimeresult['show_time']; ?>
                    </p>

                    <p>
                        <span>Ticket Price</span>
                        $<?php echo $showtimeresult['ticket_price']; ?>
                    </p>

                    <p>
                        <span>Hall</span>
                        <?php echo $showtimeresult['hall_id']; ?>
                    </p>

                    <a class="select"
                    href="booking.php?movie_id=<?php echo $id; ?>&showtime_id=<?php echo $showtimeresult['showtime_id']; ?>">
                        Select
                    </a>

                </div>

            <?php } ?>

    </div>


    <?php if(isset($_GET['showtime_id'])){ ?> 

        <h2>Select Your Seats</h2>

        <form method="POST" action="confirmbooking.php">

            <input type="hidden"
                   name="movie_id"
                   value="<?php echo $movie['movie_id']; ?>">

            <input type="hidden"
                   name="showtime_id"
                   value="<?php echo $showtime_id; ?>">

            <input type="hidden"
                   name="hall_id"
                   value="<?php echo $hall_id; ?>">


            <div class="seats">
                

                <?php while($seatsresult = mysqli_fetch_assoc($seats)){ ?>

                        <?php
                        // هل هذه القيمة موجودة داخل هذا الـ array؟
                            $isBooked = in_array($seatsresult['seat_id'], $booked_seats);
                        ?>
                       

                        <label class="seat <?php echo $isBooked ? 'booked' :'' ; ?>">
                            

                            <input type="checkbox" 
                                name="seats[]"
                                value="<?php echo $seatsresult['seat_id']; ?>"
                                <?php echo $isBooked ? 'disabled' : ''; ?>>

                            <?php echo $seatsresult['seat_name']; ?>

                        </label>

                    <?php } ?>

            </div>
            <br>
           

            <button type="submit" class="continue">
                Continue
            </button>

        </form>

     <?php } ?>

</div>
</form>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
