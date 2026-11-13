<?php
require_once '../connection.php';
session_start();
$sql = "SELECT * FROM users ";
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
        </style>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Role</th>
            
        </tr>
         <?php while($user=mysqli_fetch_assoc($result)){ ?>
        <tr>
           
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['created_at']; ?></td>
            <td><?php if($user['role']==1){echo "Admin";}else{echo "User";} ?></td>
            <?php } ?>
            
        </tr>
    </table>
    
</body>
</html>