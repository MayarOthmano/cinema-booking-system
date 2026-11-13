<?php
require_once '../connection.php';
session_start();
$sql = "SELECT * FROM showtime where status!='unavailable'";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            background-color: #151515;
            color: #D4AF37;
        }
        table{
            margin-top: 20px;
        }
        
        td ,th  {
            border: 1px solid #D4AF37;
        }
        th, td {
            padding: 15px;
        }
         a{
            background-color: #D4AF37;
            color: #151515;
            border: none;
            padding: 10px;
            text-decoration: none;
            border-radius: 10px;
            margin-right: 10px;
           
        }
        td .action{
            display: flex;
            flex-direction:column;
            justify-content: center;
        }

        a:hover{
            background-color: #151515;
            color: #D4AF37;
        }
    </style>
</head>
<body>
    <a href="addshowtime.php">Add Showtime</a>
    <table>
        <tr>
            <th>Movie ID</th>
            <th>Hall ID</th>
            <th>Show Date</th>
            <th>Show Time</th>
            <th> Ticket Price</th>
            <th>Actions</th>
        </tr>
        <?php while($showtime=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $showtime['movie_id']; ?></td>
            <td><?php echo $showtime['hall_id']; ?></td>
            <td><?php echo $showtime['show_date']; ?></td>
            <td><?php echo $showtime['show_time']; ?></td>
            <td><?php echo $showtime['ticket_price']; ?>$</td>
            <td>
                <a class="action" href="editshowtime.php?showtime_id=<?php echo $showtime['showtime_id']; ?>">Edit</a> <br>
                <a class="action" href="deleteshowtime.php?showtime_id=<?php echo $showtime['showtime_id']; ?>">Delete </a>
            </td>
        </tr>
        <?php } ?>
    </table>
    
</body>
</html>