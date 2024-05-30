<?php
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

<body class="container-fluid">
    <?php include './includes/nav.inc'; ?>
    <main class="details-container">
        <div class="details-main">
            <div class="details-left">
                <img src="<?php echo htmlspecialchars($hike['image']); ?>" alt="<?php echo htmlspecialchars($hike['hikename']); ?>" class="hike-image">
                <div class="hike-infos">
                    <div class="hike-info">
                        <div class="material-symbols-outlined">hiking</div>
                        <div><?php echo htmlspecialchars($hike['distance']); ?> km</div>
                    </div>

                    <div class="hike-info">
                        <span class="material-symbols-outlined">landscape</span>
                        <div><?php echo htmlspecialchars($hike['level']); ?></div>
                    </div>

                    <div class="hike-info">
                        <div class="material-symbols-outlined">location_on</div>
                        <div><?php echo htmlspecialchars($hike['location']); ?></div>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="hike-name"><?php echo htmlspecialchars($hike['hikename']); ?></h2>
                <p class="hike-description"><?php echo htmlspecialchars($hike['description']); ?></p>
            </div>
        </div>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <div class="detail-buttons">
                <button onclick="location.href='edit.php?hikeid=<?php echo $hike['hikeid']; ?>'">Edit</button>
                <button onclick="location.href='delete_confirm.php?hikeid=<?php echo $hike['hikeid']; ?>'">Delete</button>
            </div>
        <?php endif; ?>

        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
</body>
</html>
