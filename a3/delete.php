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

    // Handle form submission to delete the hike
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Prepare and execute the delete statement
            $sql = "DELETE FROM hikes WHERE hikeid = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$hikeid]);

            // Set a success message
            $message = "Record Deleted";
        } catch (PDOException $e) {
            // Handle errors
            $message = "Error deleting hike: " . $e->getMessage();
        }
    }
} else {
    // Redirect to homepage if hike ID is not provided
    header("Location: index.php");
    exit();
}
?>

<body>
    <?php include './includes/nav.inc'; ?>

    <main class="delete-container">
        <div class="delete-intro">
            <h2>Bye bye!</h2>
            <?php if ($message): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            <p>
                We hate to see a hike go, but we are sure you had a good reason deleting it.
                Maybe you can fill in the gap by adding a new and exciting way to Discover Victoria?
            </p>
            <?php
            // Assuming the user ID is stored in the session
            if (isset($_SESSION['id'])) {
                $userid = $_SESSION['id'];
            ?>
                <a class="gallery-wrapper" href="add.php?userid=<?php echo htmlspecialchars($userid); ?>">
                    <div class="box">
                        <img src="./images/rocket.jpg" alt="Add a new hike">
                        <div class="caption">Add a new hike</div>
                    </div>
                </a>
            <?php
            } else {
                // If user ID is not available, display a message or redirect
                echo "<p>Error: User ID not found.</p>";
            }
            ?>
        </div>

        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
</body>
</html>
