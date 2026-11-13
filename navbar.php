  
<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a class="navbar-brand" href="index.php">CINEMA</a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#now-showing">Movies</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#coming-soon">Coming Soon</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#about-us">About Us</a>
                </li>

            </ul>

            <div class="d-flex flex-column flex-lg-row">
                <?php if(isset($_SESSION['islogin']) && $_SESSION['islogin'] == true) {
                    echo '<a class="btn logout-btn" href="logout.php">Logout</a>';
                } else {
                    echo '<a class="btn login-btn" href="login.php">Login</a>';
                    echo '<a class="btn register-btn" href="register.php">Register</a>';

                }
                ?>

                <!-- <a class="btn login-btn" href="login.php">Login</a>

                <a class="btn register-btn" href="register.php">Register</a>

                <a class="btn logout-btn" href="logout.php">Logout</a> -->

            </div>

        </div>

    </div>

</nav>


  