<?php
require_once '../connection.php';
session_start();
if(isset($_POST['add_movie'])){
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $release_date = $_POST['release_date'];
    $picture = $_POST['picture'];
    $trailer = $_POST['trailer'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    $sql = "INSERT INTO movies (title, description, duration, `release`, picture, trailer, category, status) VALUES 
    ('$title', '$description', '$duration', '$release_date', '$picture', '$trailer', '$category', '$status')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Movie added successfully";
    }
    else{
        echo "Error adding movie";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD MOVIE</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
        }
        table {
            color: #D4AF37;
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <form action="addmovie.php" method="POST">
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

            </tr>
            <tr>
                <td><input type="text" name="title" required></td>
                <td><input type="text" name="description" required></td>
                <td><input type="text" name="duration" required></td>
                <td><input type="date" name="release_date" required></td>
                <td><input type="url" name="picture" required></td>
                <td><input type="url" name="trailer" required></td>
                <td><input type="text" name="category" required></td>
                <td><input type="text" name="status" required></td>
              
            </tr>
    </table>
      <td><button type="submit" name="add_movie">Add Movie</button></td>
    </form>
</body>
</html>