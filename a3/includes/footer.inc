<footer class="footer">
    <div>
        <?php
        include("db_connect.inc");

        // Query to retrieve usernames from the member table
        $sql = "SELECT username FROM member";
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
