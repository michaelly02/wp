<?php include './includes/header.inc'; ?>

<body>
    <?php include './includes/nav.inc'; ?>

    <main class="home-container">

        <form action="search.php" method="GET" class="index-form">
            <input class="index-form-item" type="text" id="search" name="search" placeholder="I am looking for">

            <select class="index-form-item" id="level" name="level">
                <option value="">Select level of adventure</option>
                <option value="easy">Easy</option>
                <option value="moderate">Moderate</option>
                <option value="hard">Hard</option>
            </select>

            <button type="submit" class="index-form-button">Search</button>
        </form>

        <?php
        include("db_connect.inc");

        // Retrieve search query and difficulty from URL parameters
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
        $level = isset($_GET['level']) ? $_GET['level'] : '';

        // Construct the SQL query based on the search query and difficulty
        $sql = "SELECT * FROM hikes WHERE 1=1"; // Initial query
        if (!empty($searchQuery)) {
            $sql .= " AND (hikename LIKE :searchQuery OR description LIKE :searchQuery)"; // Add search filter
        }
        if (!empty($level)) {
            $sql .= " AND level = :level"; // Add level filter
        }

        // Prepare and execute the query
        $stmt = $pdo->prepare($sql);
        if (!empty($searchQuery)) {
            $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
        }
        if (!empty($level)) {
            $stmt->bindValue(':level', $level, PDO::PARAM_STR);
        }
        $stmt->execute();

        // Fetch hike data and generate gallery HTML
        echo '<div class="search-wrapper">';
        while ($hike = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<a class="box" href="details.php?id=' . htmlspecialchars($hike['hikeid']) . '">';
            echo '<img src="' . htmlspecialchars($hike['image']) . '" alt="' . htmlspecialchars($hike['hikename']) . '">';
            echo '<div class="caption">' . htmlspecialchars($hike['hikename']) . '</div>';
            echo '</a>';
        }
        echo '</div>';

        // Close database connection
        $pdo = null;
        ?>

        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
</body>

</html>
