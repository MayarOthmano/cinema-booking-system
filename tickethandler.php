<?php
session_start();
require_once("connection.php");

$ticket_id = $_POST['ticket_id'] ?? '';

$sql = "SELECT * FROM booking WHERE booking_code='$ticket_id'";
$result = mysqli_query($conn, $sql);
$s = mysqli_fetch_assoc($result);
 
if ($s['booking_code'] == '') {
    echo "Ticket does not exist.";
    exit;

}
else if ($s['statusofticket'] == 'scanned') {
    echo "Ticket has already been scanned.";
    exit;
} 

else {
    $sql = "UPDATE booking SET statusofticket='scanned' WHERE booking_code='$ticket_id'";
    mysqli_query($conn, $sql);
    echo "Ticket has been scanned.";
}
?>