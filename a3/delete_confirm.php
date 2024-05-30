<?php
// Include header
include './includes/header.inc';

// Include database connection
include("db_connect.inc");

// Initialize message variable
$message = "";

// Check if hike ID is provided
if (isset($_GET['hikeid'])) {
    $hikeid = $_GET['hikeid'];

    // Fetch hike details to display
    $sql = "SELECT * FROM hikes WHERE hikeid = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hikeid]);
    $hike = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirect to homepage if hike ID is not provided
    header("Location: index.php");
    exit();
}
?>

<body class="container-fluid">
    <?php include './includes/nav.inc'; ?>

    <main class="delete-container">
        <div class="delete-intro">
            <h2>Are you sure you want to delete this hike?</h2>
            
            <?php if ($hike): ?>
                <div class="gallery-wrapper">
                    <div class="box">
                        <img src="<?php echo htmlspecialchars($hike['image']); ?>" alt="<?php echo htmlspecialchars($hike['hikename']); ?>">
                        <div class="caption"><?php echo htmlspecialchars($hike['hikename']); ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <form method="post" action="delete.php?hikeid=<?php echo $hikeid; ?>" class="detail-buttons">
                <button type="button" class="cancel-button" onclick="location.href='details.php?id=<?php echo $hikeid; ?>'">Cancel</button>
                <button type="submit" class="confirm-button">Delete</button>
            </form>

            <?php if ($message): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
        </div>

        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
</body>
</html>
