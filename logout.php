<?php
session_start();
session_unset();
session_destroy();
$_SESSION['islogin'] = false;
header("Location: login.php");

?>