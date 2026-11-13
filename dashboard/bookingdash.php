
<?php
session_start();
require_once "../connection.php";
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$ticket_id=$_POST['ticket_id'];

$sql = "SELECT * FROM booking WHERE booking_code='$ticket_id'";
$result = mysqli_query($conn, $sql);
$s = mysqli_fetch_assoc($result);

if (!$s) 
{
    $message = 'Ticket does not exist.';
}

elseif ($s['statusofticket'] == 'scanned') 
{
    $message = 'Ticket has already been scanned.';
   
} 
else 
{
    $sql = "UPDATE booking SET statusofticket='scanned' WHERE booking_code='$ticket_id'";
    mysqli_query($conn, $sql);
    $message = 'Ticket has been scanned.';
}


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body{
            background-color: #0B0B0B;
            display: flex;
            flex-direction: column;
            background-color: #151515;
            color: #D4AF37;
            align-items: center;
            justify-content: center;
            align-content: center;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            align-content: center;
        }
        input{
            background-color: black;
            color: #D4AF37;
            border: none;
            padding: 10px;
            text-decoration: none;
            border-radius: 10px;
            margin-top: 10px;
            margin-right: 10px;
            font-size: 30px;
           
        }
        .scan-ticket{
            color: #D4AF37;
            font-size: 20px;
            margin-bottom: 10px;
        }

    

        
    </style>
</head>
<body>
   <?php if($message!="")
    {?>
       <div class="scan-ticket">
        <?php echo $message;?>
    </div>
   <?php }?>

    <form action="bookingdash.php" method="POST">
        <input type="text" name="ticket_id" placeholder="Ticket ID">
        <input type="submit" value="Submit">
    </form>
</body>
</html>