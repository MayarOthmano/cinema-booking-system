<?php
require_once '../connection.php';
session_start();
$movie_id = $_GET['movie_id'];
$sql = "SELECT * FROM movies WHERE movie_id = '$movie_id'";
$result = mysqli_query($conn, $sql);
$movie = mysqli_fetch_assoc($result);

if (!$movie) {
    die("Movie not found.");
}
if(isset($_POST['editmovie'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $release_date = $_POST['release_date'];
    $picture = $_POST['picture'];
    $trailer = $_POST['trailer'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    $sql_update = "UPDATE movies SET title='$title', description='$description', duration='$duration', `release`='$release_date', picture='$picture', trailer='$trailer', category='$category', status='$status' WHERE movie_id='$movie_id'";
    
    if (mysqli_query($conn, $sql_update)) {
        echo "Movie updated successfully.";
        header("Location: movie.php");
        exit();
    } else {
        echo "Error updating movie: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            color: #D4AF37;
            margin-top: 20px;   
        }
        table, th, td {
            border: 1px solid #D4AF37;
        }
        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>
    <form action="editmovie.php?movie_id=<?php echo $movie_id; ?>" method="POST">
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
        <tr>
            <td><input type="text" name="title" value="<?php echo $movie['title']; ?>"></td>
            <td><textarea name="description"><?php echo $movie['description']; ?></textarea></td>
            <td><input type="text" name="duration" value="<?php echo $movie['duration']; ?>"></td>
            <td><input type="date" name="release_date" value="<?php echo $movie['release']; ?>"></td>
            <td><input type="url" name="picture" value="<?php echo $movie['picture']; ?>"></td>
            <td><input type="url" name="trailer" value="<?php echo $movie['trailer']; ?>"></td>
            <td><input type="text" name="category" value="<?php echo $movie['category']; ?>"></td>
            <td><input type="text" name="status" value="<?php echo $movie['status']; ?>"></td>
            <td colspan="8"><button type="submit" name="editmovie">Edit Movie</button></td>
        </tr>
    </table>
    </form>
    
</body>
</html>