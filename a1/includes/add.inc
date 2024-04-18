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