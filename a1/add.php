<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('db_connect.inc');
        $hikename = $_POST["hikename"];
        $description = $_POST["description"];
        $image = $_POST["image"];
        $caption = $_POST["caption"];
        $distance = $_POST["distance"];
        $location = $_POST["location"];
        $level = $_POST["level"];

        
        try {
            require_once "db_connect.inc";

            $query = "INSERT INTO hikes (hikename, description, image, caption, distance, location, level) VALUES 
            (?, ?, ?, ?, ?, ?, ?);";

            $stmt = $pdo->prepare($query);

            $stmt->execute([$hikename, $description, $image, $caption, $distance, $location, $level]);


            // if ($stmt->affected_rows > 0) {
            //     echo "A new record has been created";
            // }

            $pdo = null;
            $stmt = null;
            header("Location: ./add.php");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    else {
        // header("Location: ./add.php");
        // die();
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
                <form action="" method="POST">


                    <label class="required" for="hikename">Hike Name </label><br>
                    <input type="text" id="hikename" name="hikename" required placeholder="Name of hike"><br>


                    <label class="required" for="description">Description </label><br>
                    <textarea id="description" name="description" required placeholder="Describe the hike"></textarea><br>

                    <label class="required" for="image">Select an image </label><br>
                    <input type="file" id="image" name="image" required><br>

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