<?php
session_start();
require_once("connection.php");

$sql = "SELECT * FROM movies ";
$movies = mysqli_query($conn, $sql);
// mysqli_query=> وظيفتها تنفيذ SQL query على قاعدة البيانات
$sql = "SELECT * FROM movies 
        WHERE status = 'now_showing'" ;
        

$nowShowing = mysqli_query($conn, $sql);


$sql = "SELECT * FROM movies 
        WHERE status = 'coming_soon' 
    ";
$comingSoon = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
    <?php include("navbar.php"); ?>
    
    <section class="hero">

    <div id="movieHero"
         class="carousel slide"
         data-bs-ride="carousel"
         data-bs-interval="3000">

        <div class="carousel-inner">

            <?php 
            $first = true;

            while($movie = mysqli_fetch_assoc($movies)){ 
            ?>

                <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">

                    <img src="<?php echo $movie['picture']; ?>"
                         class="d-block w-100"
                         alt="<?php echo $movie['title']; ?>">

                </div>

            <?php 
                $first = false;
            } 
            ?>

        </div>


        <!-- السهم السابق -->
        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#movieHero"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

            <span class="visually-hidden">Previous</span>

        </button>


        <!-- السهم التالي -->
        <button class="carousel-control-next"
                type="button"
                data-bs-target="#movieHero"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

            <span class="visually-hidden">Next</span>

        </button>

    </div>

</section>
    
   <main>

    <section class="movies-section" id="now-showing">

        <div class="container">

            <h2 class="section-title">Now Showing</h2>

            <div class="movies-grid">

                <?php while($movie = mysqli_fetch_assoc($nowShowing)){ ?>

                    <div class="movie-card">

                        <a href="details.php?movie_id=<?php echo $movie['movie_id']; ?>">

                            <img src="<?php echo $movie['picture']; ?>"
                                 alt="<?php echo $movie['title']; ?>">

                        </a>

                        <div class="movie-info">

                            <h3>
                                <?php echo $movie['title']; ?>
                            </h3>

                            <p>
                                <?php echo $movie['category']; ?>
                                |
                                <?php echo $movie['duration']; ?> mins
                            </p>

                            <a href="booking.php?movie_id=<?php echo $movie['movie_id']; ?>"
                               class="book-btn">
                                BOOK NOW
                            </a>

                        </div>

                    </div>

                <?php } ?>
                
               

            </div>

        </div>
        <div class="container" id="coming-soon">

            <h2 class="section-title">Coming Soon</h2>

            <div class="movies-grid">

                <?php while($movie = mysqli_fetch_assoc($comingSoon)){ ?>

                    <div class="movie-card">

                        <a href="details.php?movie_id=<?php echo $movie['movie_id']; ?>">

                            <img src="<?php echo $movie['picture']; ?>"
                                 alt="<?php echo $movie['title']; ?>">

                        </a>

                        <div class="movie-info">

                            <h3>
                                <?php echo $movie['title']; ?>
                            </h3>

                            <p>
                                <?php echo $movie['category']; ?>
                                |
                                <?php echo $movie['duration']; ?> mins
                            </p>

                            <a href="booking.php?movie_id=<?php echo $movie['movie_id']; ?>"
                               class="book-btn">
                                BOOK NOW
                            </a>

                        </div>

                    </div>

                <?php } ?>
                
               

            </div>

        </div>

    </section>

</main>

<section class="about-section" id="about-us">

    <div class="container">

        <div class="about-content">

            <h2 class="section-title">About Us</h2>

            <p>
                Welcome to CINEMA, your easy and comfortable way
                to explore movies and book your favorite seats.
            </p>

            <p>
                Browse the latest movies, check available showtimes,
                choose your preferred seats, and confirm your booking
                in just a few simple steps.
            </p>

        </div>

    </div>

</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<?php include("footer.php"); ?>
  </body>
</html> 


    