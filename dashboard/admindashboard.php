<?php
require_once "../connection.php";
session_start();
$sql = "SELECT COUNT(*) as total FROM movies";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_movies = $row['total'];

$sql="SELECT COUNT(*) as total FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_users = $row['total'];

$sql="SELECT COUNT(*) as total FROM booking";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_bookings = $row['total'];

$sql="SELECT SUM(total_price) as total FROM booking WHERE status='Confirmed'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_confirmed = $row['total'];


$sql="SELECT movies.title, showtime.show_date, showtime.show_time, hall.hall_name
FROM showtime
inner join movies
ON showtime.movie_id=movies.movie_id
inner join hall
ON showtime.hall_id=hall.hall_id
WHERE CONCAT(showtime.show_date,' ',showtime.show_time)>=NOW()
ORDER BY showtime.show_date DESC";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$sql = "SELECT movie_id, title, picture, status
        FROM movies
        WHERE status != 'inactive'
        ORDER BY movie_id DESC
        LIMIT 4";

$movies_result = mysqli_query($conn, $sql);


$sql="SELECT status, COUNT(*) as total FROM movies GROUP BY status";
$status_result = mysqli_query($conn, $sql);
$movie_status=[];
$movie_total=[];

while($status_row=mysqli_fetch_assoc($status_result)){
    $movie_status[]=$status_row['status'];
    $movie_total[]=$status_row['total'];
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin</title>
     
     <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>
<body>
  
<button class="btn btn-dark d-lg-none m-3"
     type="button"
     data-bs-toggle="offcanvas"
     data-bs-target="#offcanvasExample"
     aria-controls="offcanvasExample">
☰ Menu </button>



<div class="offcanvas-lg offcanvas-start sidebar"
     tabindex="-1"
     id="offcanvasExample"
     aria-labelledby="offcanvasExampleLabel">

<div class="offcanvas-header">
    <div class="logo">
        <span>Cinema</span>
    </div>

    <button type="button"
            class="btn-close btn-close-white d-lg-none"
            data-bs-dismiss="offcanvas"
            aria-label="Close">
    </button>
</div>

<div class="offcanvas-body">
    <div class="sidebar-nav">

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link active " href="admindashboard.php">
                    Dashboard
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="movie.php">Movies</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="showtime.php">Showtimes</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="booking.php">Bookings</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="user.php">View Users</a>
            </li>

        </ul>

    </div>
</div>


</div>

</div>

    <main class="main">
        <header class="header">
            <div class="header-left">
                 <h3>Admin Dashboard</h3>
            </div> 
            <div class="header-right"> 
                <button type="button" class="btn-new" data-bs-toggle="modal" data-bs-target="#scanticket">Scan Ticket</button>
                <span class="admin-icon">♙</span> 
                <span class="admin-name">Admin</span> 
                <a href="../index.php" style="border:1px soild  #D4AF37 ;color: #D4AF37;padding: 10px;border-radius: 5px;text-decoration:none;">Home</a>
            </div>

        </header>


    <section class="content">
            <h1>Welcome Admin</h1>
            <p>Here's what happened today</p>
            <div class="today-date">
               📅 <?php echo date("F d, Y"); ?>
            </div>

            <div class="stats-content">
                <div class="stats-card" >
          <!-- The <canvas> is the space where Chart.js draws your pie chart -->
                    <canvas id="myChart"></canvas>
                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                         new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: <?php echo json_encode($movie_status); ?>,
                                datasets: [{
                                    label: 'Movies',
                                    data: <?php echo json_encode($movie_total); ?>,
                                    backgroundColor: [
                                       '#D4AF37',
                                        '#8B0000',
                                        '#808080'
                                    ],
                                    borderColor: [
                                       '#151515',
                                    ],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                responsive: true,
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        });
                    </script>
                </div>









                <div class="stats-card">
                        <h5>Total Movies</h3>
                        <h2><?php echo $total_movies; ?></h2>
                        <p>Movies in cinema</p>

                </div>
                <div class="stats-card">
                        <h5>Total Users</h3>
                        <h2><?php echo $total_users; ?></h2>
                        <p>Users in cinema</p>
                </div>

                <div class="stats-card">
                    <h5>Total Bookings</h5>
                    <h2><?php echo $total_bookings; ?></h2>
                    <p>Total reservations</p>
                </div>
                <div class="stats-card">
                    <h5>Total Revenue</h5>
                    <h2><?php echo $total_confirmed; ?><small>JOD</small> </h2>
                    <p>Total booking revenue</p>
                </div>
               


        </div>
        
        

        <div class="dashboard-movie">
            <div class="movie-header">
                <h2>Movie</h2>
                <div class="movie-btn">
                    <button type="button" class="btn-new" data-bs-toggle="modal" data-bs-target="#addMovieModal">+ Add Movie</button>
                   
                    <button type="button" class="btn-new" data-bs-toggle="modal" data-bs-target="#viewMovieModal">View All</button>
                 </div>
            </div>
            
            <div class="movie-list">
               <?php while ($movie_result = mysqli_fetch_assoc($movies_result)) { ?>
                    <div class="movie-item">
                        <img src="<?php echo $movie_result['picture']; ?>">
                        <h3><?php echo $movie_result['title']; ?></h3>
                        <p><?php echo $movie_result['status']; ?></p>
                    </div>
                <?php } ?>
            </div>
           
        </div>
        <div class="next-showtime">
        <div class="showtime-header">
            
            <h3>Next Showtime</h3>
             <div class="showtime-btn">
                    <button type="button" class="btn-new" data-bs-toggle="modal" data-bs-target="#addshowtimeModal">+ Add showtime</button>
                    
                    <button type="button" class="btn-new" data-bs-toggle="modal" data-bs-target="#viewshowtimeModal">View All</button>
             </div>
        </div>
            <?php if($row){ ?>
                <h2><?php echo $row['title']; ?></h2>
                <p><?php echo $row['hall_name']; ?></p>
                <p><?php echo $row['show_date']; ?></p>
                <p><?php echo $row['show_time']; ?></p>
            <?php } ?>
        </div>  
        
    </section>

<?php
function Modal($id,$title,$page){?>
    <div class="modal fade" id="<?php echo $id; ?>" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content"
                style="background-color:#151515; border: 1px solid #D4AF37;color: #D4AF37!important;">

                <div class="modal-header">
                    <h5 style="color: #D4AF37;"><?php echo $title; ?></h5>

                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">
                    <iframe src="<?php echo $page; ?>"
                            style="width: 100%; height: 400px; border: none;color: #D4AF37;">
                    </iframe> 
                </div>
            </div>
        </div>

</div>

<?php
}
?>
<?php Modal("viewshowtimeModal", "View All Showtimes", "showtime.php"); ?>
<?php Modal("addshowtimeModal", "Add Showtime", "addshowtime.php"); ?>



<?php Modal("viewMovieModal", "View All Movies", "movie.php"); ?>
<?php Modal("addMovieModal", "Add Movie", "addmovie.php"); ?>

<?php Modal("scanticket", "Scan Ticket", "bookingdash.php"); ?>



    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <body>

</html>

        