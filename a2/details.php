<?php
// Include database connection
include("db_connect.inc");

// Check if ID parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query the database to retrieve hike details based on ID
    $sql = "SELECT * FROM hikes WHERE hikeid = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    // Fetch hike details
    $hike = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirect to error page or homepage if ID is not provided
    header("Location: index.php");
    exit(); // Stop script execution
}
?>

<?php include './includes/header.inc'; ?>



<body>
    <?php include './includes/nav.inc'; ?>
    <main class="home-container">

        <img src="<?php echo $hike['image']; ?>" alt="<?php echo $hike['hikename']; ?>" class="hike-image">

        <div class="hike-infos">
            <div class="hike-info">

                <div class="material-symbols-outlined">hiking</div>
                <div><?php echo $hike['distance']; ?> km </div>

            </div>

            <div class="hike-info">

                <span class="material-symbols-outlined">landscape</span>
                <div><?php echo $hike['level']; ?></div>

            </div>


            <div class="hike-info">

                <div class="material-symbols-outlined">location_on</div>
                <div><?php echo $hike['location']; ?></div>

            </div>
        </div>




        
        <h2 class="hike-name"><?php echo $hike['hikename']; ?></h2>
        <p class="hike-description"><?php echo $hike['description']; ?></p>
        <?php include './includes/footer.inc'; ?>


    </main>

    <script src="./main.js"></script>

</body>

</html>