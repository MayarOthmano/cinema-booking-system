<?php
require_once '../connection.php';
session_start();
if(isset($_POST['addshowtime'])){
    $movie_id = $_POST['movie_id'];
    $hall_id = $_POST['hall_id'];
    $show_date = $_POST['show_date'];
    $show_time = $_POST['show_time'];
    $ticket_price = $_POST['ticket_price'];

    $sql = "INSERT INTO showtime (movie_id, hall_id, show_date, show_time, ticket_price) VALUES 
    ('$movie_id', '$hall_id', '$show_date', '$show_time', '$ticket_price')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Showtime added successfully";
        header("Location: showtime.php");
        exit(); 
    }
    else{
        echo "Error adding showtime";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" herf="../css/addshowtime.css">
    <title>ADD SHOWTIME</title>
    <style>
        *{
            box-sizing: border-box;
            align-items: center;
            justify-content: center;
            justify-items: center;
            background-color: #0B0B0B;

        }

        table{
            border: 1px solid #D4AF37;
            border-radius: 5px;
            color: #D4AF37;
            margin-bottom: 20px;
           
        }
        th, td {
            padding: 15px;
        }
        input[type="text"], input[type="date"], input[type="time"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #D4AF37;
            border-radius: 5px;
            color: #D4AF37;
            
        }  
        button[type="submit"] {
            background-color: #D4AF37;
            color: #0B0B0B;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form action="addshowtime.php" method="POST">
        <table>
            <tr>
                <th>Movie ID</th>
                <th>Hall ID</th>
                <th>Show Date</th>
                <th>Show Time</th>
                <th>Ticket Price</th>
            </tr>
            <tr>
                <td><input type="text" name="movie_id" required></td>
                <td><input type="text" name="hall_id" required></td>
                <td><input type="date" name="show_date" required></td>
                <td><input type="time" name="show_time" required></td>
                <td><input type="number" name="ticket_price" required></td>
              
            </tr>
    </table>
      <td><button type="submit" name="addshowtime">Add Showtime</button></td>
    </form>
</body>
</html> 