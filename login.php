
<?php
session_start();
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


$sql = "SELECT * FROM users WHERE email= '$email'" ;
$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);//هذا السطر يأخذ الصف الذي وجدناه ويحوله إلى Associative Array
    if(password_verify($password, $user['password'])){
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['islogin'] = true;
    $_SESSION['role'] = $user['role'];

    if($user['role'] == 1){
        header("Location:dashboard/admindashboard.php");
        exit;
    }
    else {
        header("Location: index.php");
    }
    exit;
}

}   

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginregister.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>login</title>
    
</head>
<body>
    
<?php require_once("navbar.php");?>   
<form action="login.php" method="post">
   
    <h2>Login to the Cinema Booking System</h2>
    <label for="email">Email</label>
    <input type="email" name="email"  required  placeholder="Enter your email"><br>
    <label for="password">Password</label>
    <input type="password" name="password" required placeholder="Enter your password"><br>
    <input type="submit" value="Login">
    <a href="forgot_password.php">Forgot Password?</a>
    <a href="register.php">Register</a>


</form>
<?php require_once("footer.php");?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
