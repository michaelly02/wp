<footer class="footer">
    <div>
        <?php
        include("db_connect.inc");

        // Query to retrieve distinct usernames from the hikes table who have uploaded hikes
        $sql = "SELECT DISTINCT username FROM hikes WHERE username IS NOT NULL";
        $stmt = $pdo->query($sql);

        // Loop through the usernames and generate hyperlinks
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $username = $row['username'];
            echo '<a href="user.php?username=' . urlencode($username) . '">' . htmlspecialchars($username) . '</a>';
            echo ' '; // Add space between usernames
        }

        // Close database connection
        $pdo = null;
        ?>
    </div>
    <div>Copyright s3899226. All Rights Reserved | Designed For Hikes Victoria</div>
</footer>
