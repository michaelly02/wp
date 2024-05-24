<?php
    include 'db_connect.inc'; // Include the database connection file

    try {
        // Fetch the 4 images with the highest hikeid from the database
        $stmt = $pdo->prepare("SELECT image FROM hikes ORDER BY hikeid DESC LIMIT 4");
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

    } catch(PDOException $e) {
        // Handle database connection errors
        echo "Error: " . $e->getMessage();
    }

?>

<?php include './includes/header.inc'; ?>
<body>
<?php include './includes/nav.inc'; ?>


<main class="index-container">
<script>
    var sessionID = <?php echo isset($_SESSION['id']) ? json_encode($_SESSION['id']) : 'null'; ?>;
    console.log(sessionID);
</script>

<?php
    if (isset($_GET['registered']) && $_GET['registered'] == 'success') {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            Registered successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if (isset($_GET['login']) && $_GET['login'] == 'success') {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            Logged in successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>


    <div class="index-wrapper">

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            // Loop through the fetched images and generate carousel items
            $active = true; // To mark the first item as active
            foreach ($images as $image) {
            ?>
            <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                <img src="<?php echo $image; ?>" class="d-block w-100" alt="...">
            </div>
            <?php
            $active = false; // Set active to false after the first item
            }
            ?>
        </div>
    </div>

        <div class="home-box">
            <h2 class="home-box-title">
                Hikes Victoria
            </h2>
            <div class="home-intro">
                WELCOME TO VICTORIA
            </div>
        </div>

        

        
    </div>

    
        <form action="search.php" method="GET" class="index-form">
            <input class="index-form-item"  type="text" id="search" name="search" placeholder="I am looking for">
            
            <select class="index-form-item" id="level" name="level">
                <option value="">Select level of adventure</option>
                <option value="easy">Easy</option>
                <option value="moderate">Moderate</option>
                <option value="hard">Hard</option>
            </select>
            
            <button type="submit" class="index-form-button" >Search</button>
        </form>

        <div class="index-intro">

        <h2>Discover Victoria your own way</h2>
        <p>
            Victoria, Australia, is a haven for hiking enthusiasts, boasting an array of trails that cater to
            various preferences and skill levels. From coastal paths to mountain tracks, Victoria offers diverse
            landscapes that promise unforgettable outdoor experiences. Whether you're seeking a leisurely stroll
            through lush forests or an adrenaline-pumping ascent to panoramic viewpoints, Victoria's hiking trails
            invite exploration and discovery amidst its natural wonders.
        </p>

    </div>
    

    <?php include './includes/footer.inc'; ?>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./main.js"></script>
</body>
</html>
