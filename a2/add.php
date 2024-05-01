<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    include('db_connect.inc');
    $hikename = $_POST["hikename"];
    $description = $_POST["description"];
    $image_name = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];
    $caption = $_POST["caption"];
    $distance = $_POST["distance"];
    $location = $_POST["location"];
    $level = $_POST["level"];

    // Upload directory
    $upload_dir = "img/";

    // Move uploaded file to the upload directory
    if (move_uploaded_file($image_tmp, $upload_dir . $image_name)) {
        // File uploaded successfully, insert file path into database
        $image_path = $upload_dir . $image_name;
        
        try {
            // Prepare SQL statement
            $sqlInsert = "INSERT INTO hikes (hikename, description, image, caption, distance, location, level) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sqlInsert);
            $stmt->execute([$hikename, $description, $image_path, $caption, $distance, $location, $level]);

        } catch (PDOException $e) {
            // Handle the error
            echo "Error inserting into the database: " . $e->getMessage();
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file uploaded or invalid request.";
}
?>

<?php include './includes/header.inc'; ?>




<body>
    <?php include './includes/nav.inc'; ?>


    <main class="home-container">
        <div class="add-wrapper">
            <div class="add-box">
                <h2>
                    Add a hike
                </h2>
                <div>
                    You can add a new hike here
                </div>
            </div>

            <div class="add-box">
                <form method="post" enctype="multipart/form-data">


                    <label class="required" for="hikename">Hike Name </label><br>
                    <input type="text" id="hikename" name="hikename" required placeholder="Name of hike"><br>


                    <label class="required" for="description">Description </label><br>
                    <textarea id="description" name="description" required placeholder="Describe the hike"></textarea><br>

                    <label class="required" for="image">Select an image </label><br>
                    <input type="file" name="image" id="image" required><br>

                    <label class="required" for="caption">Image Caption </label><br>
                    <input type="text" id="caption" name="caption" required><br>

                    <label class="required" for="distance">Distance </label><br>
                    <input type="text" id="distance" name="distance" required placeholder="Distance in km"><br>

                    <label class="required" for="location">Location </label><br>
                    <input type="text" id="location" name="location" required placeholder="Location of hike"><br>

                    <label class="required" for="level">Level </label><br>
                    <select id="level" name="level" required>
                        <option value="">Select</option>
                        <option value="easy">Easy</option>
                        <option value="moderate">Moderate</option>
                        <option value="hard">Hard</option>
                    </select><br>
                    <div class="buttons">
                        <button type="submit" id="submitButton">
                            <span class="material-symbols-outlined white">
                                done
                            </span> Submit</button>
                        <button type="reset" id="clearButton"><span class="material-symbols-outlined">
                                close
                            </span> Clear</button>
                    </div>





                </form>
            </div>
        </div>

        <?php include './includes/footer.inc'; ?>
    </main>



    <script src="./main.js"></script>
</body>

</html>