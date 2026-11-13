<?php
require_once '../connection.php';
session_start();
$showtime_id = $_GET['showtime_id'];
$sql = "SELECT * FROM showtime WHERE showtime_id = '$showtime_id'";
$result = mysqli_query($conn, $sql);
$showtime = mysqli_fetch_assoc($result);

if (!$showtime) {
    die("Showtime not found.");
}
if(isset($_POST['editshowtime'])){
    $movie_id = $_POST['movie_id'];
    $hall_id = $_POST['hall_id'];
    $show_date = $_POST['show_date'];
    $show_time = $_POST['show_time'];
    $ticket_price = $_POST['ticket_price'];

    $sql_update = "UPDATE showtime SET movie_id='$movie_id', hall_id='$hall_id', show_date='$show_date', show_time='$show_time', ticket_price='$ticket_price' WHERE showtime_id='$showtime_id'";
    
    if (mysqli_query($conn, $sql_update)) {
        echo "Showtime updated successfully.";
        header("Location: showtime.php");
        exit();
    } else {
        echo "Error updating showtime: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            color: #D4AF37;
            margin-top: 20px;   
        }
        table, th, td {
            border: 1px solid #D4AF37;
        }
        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>
    <form action="editshowtime.php?showtime_id=<?php echo $showtime_id; ?>" method="POST">
        <table>
            <tr>
                <th>Movie ID</th>
                <th>Hall ID</th>
                <th>Show Date</th>
                <th>Show Time</th>
                <th>Ticket Price</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td><input type="text" name="movie_id" value="<?php echo $showtime['movie_id']; ?>"></td>
                <td><input type="text" name="hall_id" value="<?php echo $showtime['hall_id']; ?>"></td>
                <td><input type="date" name="show_date" value="<?php echo $showtime['show_date']; ?>"></td>
                <td><input type="time" name="show_time" value="<?php echo $showtime['show_time']; ?>"></td>
                <td><input type="number" name="ticket_price" value="<?php echo $showtime['ticket_price']; ?>"></td>
                <td colspan="8"><button type="submit" name="editshowtime">Edit Showtime</button></td>
            </tr>
        </table>
    </form>
    
</body>
</html>     