<?php include './includes/header.inc'; ?>

<body class="container-fluid">
    <?php include './includes/nav.inc'; ?>

    <main class="home-container">
        <div class="hike-intro">

            <h2>Victoria has a lot to offer!</h2>
            <p>
                Embark on a journey through Victoria's captivating hiking trails, where every step unveils a new wonder.
                From coastal cliffs to mountain peaks, the scenery is as diverse as it is stunning. Are you ready to
                lace up your boots and explore the beauty that awaits?
            </p>

        </div>

        <form id="filterForm" method="get">
            <select class="gallery-select" id="level" name="level" onchange="submitForm()">
                <option value="">Select level...</option>
                <option value="easy" <?php if(isset($_GET['level']) && $_GET['level'] == 'easy') echo 'selected'; ?>>Easy</option>
                <option value="moderate" <?php if(isset($_GET['level']) && $_GET['level'] == 'moderate') echo 'selected'; ?>>Moderate</option>
                <option value="hard" <?php if(isset($_GET['level']) && $_GET['level'] == 'hard') echo 'selected'; ?>>Hard</option>
            </select>
        </form>

        <?php
            // Include database connection
            include("db_connect.inc");

            // Get selected level
            $level = isset($_GET['level']) ? $_GET['level'] : '';

            // Build query based on selected level
            if ($level) {
                $sql = "SELECT * FROM hikes WHERE level = :level";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':level', $level);
                $stmt->execute();
            } else {
                $sql = "SELECT * FROM hikes";
                $stmt = $pdo->query($sql);
            }

            // Fetch hike data and generate gallery HTML
            echo '<div class="gallery-wrapper">';
            while ($hike = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<a class="box" href="details.php?id=' . $hike['hikeid'] . '">';
                echo '<img src="' . $hike['image'] . '" alt="' . $hike['hikename'] . '">';
                echo '<div class="caption">' . $hike['hikename'] . '</div>';
                echo '</a>';
            }
            echo '</div>';

            // Close database connection
            $pdo = null;
        ?>

        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
    <script src="./filter.js"></script>
</body>

</html>
