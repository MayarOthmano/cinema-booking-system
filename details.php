<?php
session_start();
require_once("connection.php");

$id = $_GET['movie_id'];

$sql = "SELECT * FROM movies WHERE movie_id = '$id'";

$result = mysqli_query($conn, $sql);

$movie = mysqli_fetch_assoc($result);

if (!$movie) {
    die("Movie not found.");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/details.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
    <?php include("navbar.php"); ?>
    
<div class="details-page">
    <div class="container">

        <div class="movie-title">
            <h1><?php echo $movie['title']; ?></h1>
        </div>

        <div class="movie-details">

            
            <div class="movie-image">
                <img 
                    src="<?php echo $movie['picture']; ?>" 
                    alt="<?php echo $movie['title']; ?>"
                >

               
                
            </div>


            <!-- Movie Information -->
            <div class="details-content">

                <p class="description">
                    <?php echo $movie['description']; ?>
                </p>

                <div class="movie-info">

                    <p>
                        <strong>Category:</strong>
                        <?php echo $movie['category']; ?>
                    </p>

                    <p>
                        <strong>Duration:</strong>
                        <?php echo $movie['duration']; ?> mins
                    </p>

                    <p>
                        <strong>Release Date:</strong>
                        <?php echo $movie['release']; ?>
                    </p>

                </div>
                <div class="details-buttons">

                    <a 
                        href="booking.php?movie_id=<?php echo $movie['movie_id']; ?>"
                        class="book-btn">
                        BOOK NOW
                    </a>

                    <a 
                        href="<?php echo $movie['trailer']; ?>"
                        target="_blank"
                        class="trailer-btn">
                        
                        TRAILER

                    </a>

                </div>

            </div>

        </div>

    </div>
</div>


<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>