<nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">
            <img src="./images/logo.png" alt="logo image">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-options" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-options" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-options" href="hikes.php">Hikes</a>
                </li>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    // User is logged in
                    // Check if username is set
                    if (isset($_SESSION['username'])) {
                        echo '<li class="nav-item"><a class="nav-link nav-options" href="add.php?username=' . urlencode($_SESSION['username']) . '">Add more</a></li>';
                    } else {
                        // Handle case where username is not set
                        echo '<li class="nav-item"><a class="nav-link nav-options" href="add.php">Add more</a></li>';
                    }
                    echo '<li class="nav-item"><a class="nav-link nav-options" href="logout.php">Log out</a></li>';
                } else {
                    // User is not logged in
                    echo '<li class="nav-item"><a class="nav-link nav-options" href="register.php">Register</a></li>';
                    echo '<li class="nav-item"><a class="nav-link nav-options" href="login.php">Login</a></li>';
                }
                ?>
            </ul>
            <form class="d-flex search-bar-container" action="search.php" method="GET">
                <input class="form-control me-2" type="search" id="search-bar" name="search" placeholder="Search">
                <button class="btn" type="submit">
                    <span class="material-symbols-outlined white">search</span>
                </button>
            </form>
        </div>
    </div>
</nav>
