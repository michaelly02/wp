<nav>
    <div>
        <a href="index.php" class="logo">
            <img src="./images/logo.png" alt="logo image">
        </a>
        
        <a class="nav-options" href="index.php">Home</a>
        <a class="nav-options" href="gallery.php">Gallery</a>
        <a class="nav-options" href="hikes.php">Hikes</a>

        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            // User is logged in
            // Check if user id is set
            if (isset($_SESSION['id'])) {
                echo '<a class="nav-options" href="add.php?userid=' . $_SESSION['id'] . '">Add more</a>';
            } else {
                // Handle case where user id is not set
                echo '<a class="nav-options" href="add.php">Add more</a>';
            }
            echo '<a class="nav-options" href="logout.php">Log out</a>';
        } else {
            // User is not logged in
            echo '<a class="nav-options" href="register.php">Register</a>';
            echo '<a class="nav-options" href="login.php">Login</a>';
        }
        ?>
        
    </div>

    <div class="search-bar-container">
        <form class="search-bar-container">
            <input type="search" id="search-bar" placeholder="Search">
            <span class="material-symbols-outlined">
                search
            </span>
        </form>
    </div>

    <div class="burger-icon">
        <span class="material-symbols-outlined">
            menu
        </span>
    </div>
</nav>
