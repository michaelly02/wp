<?php
include './includes/header.inc'; // This includes session_start() and other necessary setups
include 'db_connect.inc'; // Include the database connection file

// Check if hike ID is provided in the URL
if (isset($_GET['hikeid'])) {
    $hikeid = $_GET['hikeid'];

    // Query the database to retrieve hike details based on hike ID
    $sql = "SELECT * FROM hikes WHERE hikeid = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hikeid]);

    // Fetch hike details
    $hike = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$hike) {
        // Redirect to error page or homepage if hike not found
        header("Location: index.php");
        exit(); // Stop script execution
    }
} else {
    // Redirect to error page or homepage if hike ID is not provided
    header("Location: index.php");
    exit(); // Stop script execution
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hikename = $_POST['hikename'];
    $description = $_POST['description'];
    $caption = $_POST['caption'];
    $distance = $_POST['distance'];
    $location = $_POST['location'];
    $level = $_POST['level'];
    $image = $_FILES['image'];

    // Check if a new image was uploaded
    if ($image['error'] == UPLOAD_ERR_OK) {
        $imagePath = './images/' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $imagePath);

        // Update query with new image
        $sql = "UPDATE hikes SET hikename = ?, description = ?, caption = ?, distance = ?, location = ?, level = ?, image = ? WHERE hikeid = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$hikename, $description, $caption, $distance, $location, $level, $imagePath, $hikeid]);
    } else {
        // Update query without changing the image
        $sql = "UPDATE hikes SET hikename = ?, description = ?, caption = ?, distance = ?, location = ?, level = ? WHERE hikeid = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$hikename, $description, $caption, $distance, $location, $level, $hikeid]);
    }

    // Redirect to the hike details page
    header("Location: details.php?id=" . $hikeid);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add other head elements as needed -->
</head>
<body>
    <?php include './includes/nav.inc'; ?>
    <main class="home-container">
        <div class="add-wrapper">
            <div class="add-box">
                <h2>Edit Hike</h2>
            </div>

            <div class="add-box">
                <form method="post" enctype="multipart/form-data">

                    <input type="hidden" name="hikeid" value="<?php echo $hike['hikeid']; ?>">

                    <label class="required" for="hikename">Hike Name</label><br>
                    <input type="text" id="hikename" name="hikename" required placeholder="Name of hike" value="<?php echo htmlspecialchars($hike['hikename']); ?>"><br>

                    <label class="required" for="description">Description</label><br>
                    <textarea id="description" name="description" required placeholder="Describe the hike"><?php echo htmlspecialchars($hike['description']); ?></textarea><br>

                    <label class="required" for="image">Select an image</label><br>
                    <input type="file" name="image" id="image"><br>
                    <p>Current Image: <img src="<?php echo $hike['image']; ?>" alt="<?php echo htmlspecialchars($hike['hikename']); ?>" width="100"></p>

                    <label class="required" for="caption">Image Caption</label><br>
                    <input type="text" id="caption" name="caption" required value="<?php echo htmlspecialchars($hike['caption']); ?>"><br>

                    <label class="required" for="distance">Distance</label><br>
                    <input type="text" id="distance" name="distance" required placeholder="Distance in km" value="<?php echo htmlspecialchars($hike['distance']); ?>"><br>

                    <label class="required" for="location">Location</label><br>
                    <input type="text" id="location" name="location" required placeholder="Location of hike" value="<?php echo htmlspecialchars($hike['location']); ?>"><br>

                    <label class="required" for="level">Level</label><br>
                    <select id="level" name="level" required>
                        <option value="">Select</option>
                        <option value="Easy" <?php echo ($hike['level'] == 'Easy') ? 'selected' : ''; ?>>Easy</option>
                        <option value="Moderate" <?php echo ($hike['level'] == 'Moderate') ? 'selected' : ''; ?>>Moderate</option>
                        <option value="Hard" <?php echo ($hike['level'] == 'Hard') ? 'selected' : ''; ?>>Hard</option>
                    </select><br>

                    <div class="buttons">
                        <button type="submit" id="submitButton">
                            <span class="material-symbols-outlined white">done</span> Submit
                        </button>
                        <button type="reset" id="clearButton">
                            <span class="material-symbols-outlined">close</span> Clear
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
</body>
</html>
