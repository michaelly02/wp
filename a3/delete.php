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

    // Fetch the hike details to get the image path and associated user ID
    $sql = "SELECT image, username FROM hikes WHERE hikeid = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hikeid]);
    $hike = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the hike exists
    if ($hike) {
        // Check if the current user is authorized to delete this hike
        // Assuming the username is stored in the session
        if (isset($_SESSION['username']) && $_SESSION['username'] === $hike['username']) {
            // Handle form submission to delete the hike
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                try {
                    // Delete the image file from the server
                    if ($hike && file_exists($hike['image'])) {
                        unlink($hike['image']);
                    }

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
            // If the user is not authorized, display an error message or redirect
            $message = "Error: You are not authorized to delete this hike.";
        }
    } else {
        // If the hike does not exist, display an error message or redirect
        $message = "Error: Hike not found.";
    }
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
            // Check if the username is stored in the session
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            ?>
                <a class="gallery-wrapper" href="add.php?username=<?php echo htmlspecialchars($username); ?>">
                    <div class="box">
                        <img src="./images/rocket.jpg" alt="Add a new hike">
                        <div class="caption">Add a new hike</div>
                    </div>
                </a>
            <?php
            } else {
                // If username is not available, display a message or redirect
                echo "<p>Error: Username not found.</p>";
            }
            ?>
        </div>

        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
</body>
</html>
