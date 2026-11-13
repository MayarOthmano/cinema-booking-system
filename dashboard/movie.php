<?php
require_once '../connection.php';
session_start();
$sql = "SELECT * FROM movies WHERE status!='inactive'";
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
    <a href="addmovie.php">Add Movie</a>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Release Date</th>
            <th>Picture</th>
            <th>Trailer</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>

        </tr>
        <?php while($movie=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $movie['title']; ?></td>
            <td><?php echo $movie['description']; ?></td>
            <td><?php echo $movie['duration']; ?></td>
            <td><?php echo $movie['release']; ?></td>
            <td><img src="<?php echo $movie['picture']; ?>" alt="<?php echo $movie['title']; ?>" width="100"></td>
            <td><a href="<?php echo $movie['trailer']; ?>" target="_blank">Trailer</a></td>
            <td><?php echo $movie['category']; ?></td>
            <td><?php echo $movie['status']; ?></td>
            <td>
                <a class="action" href="editmovie.php?movie_id=<?php echo $movie['movie_id']; ?>">Edit</a> <br>
                <a  class="action" href="deletemovie.php?movie_id=<?php echo $movie['movie_id']; ?>" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>