
<?php
require_once("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];



    if($username == "" || $email == "" || $password == "" || $confirm_password == ""){
        echo "Please fill all the fields";
    }
    if($password !== $confirm_password){
        echo "Passwords do not match";
        exit;
        
    }
    $password=password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){//هذا يمنع إنشاء حساب آخر بنفس الإيميل.
        echo "Email already exists";
    }
    else{
        $sql = "INSERT INTO users (username,email,password) VALUES ('$username','$email', '$password')";
        mysqli_query($conn, $sql);
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginregister.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <form action="register.php" method="post">

        <label for="username">Username</label>
        <input type="username" name="username" id="username" required placeholder="Enter your username"><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required placeholder="Enter your email"><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required placeholder="Enter your password"><br>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirm your password"><br>
        <input type="submit" value="Register">
        <a href="login.php">Already have an account? Login</a>
        </form>
        <?php include("footer.php"); ?>
</body>
</html>

