<nav>
        <div>
            <a href="index.php" class="logo">
                <img src="./img/logo.png" alt="logo image">
            </a>
            <select id="redirectSelect" onchange="redirectToPage()">
                <option value="">Select Page</option>
                <option value="index.php">Home</option>
                <option value="add.php">Add</option>
                <option value="gallery.php">Gallery</option>
                <option value="hikes.php">Hikes</option>
            </select>
        </div>


        <!-- <div class="icons">
            <i class="bi bi-search" id="search-btn"></i>
        </div> -->
        <div>
            <form class="search-bar-container">
                <input type="search" id="search-bar" placeholder="Search">
                <span class="material-symbols-outlined">
                    search
                </span>
                

            </form>
        </div>
    </nav>