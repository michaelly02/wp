<?php
// Include header
include './includes/header.inc';

// Include database connection
include("db_connect.inc");

// Check if username is provided
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Fetch user details
    $sqlUser = "SELECT * FROM member WHERE username = ?";
    $stmtUser = $pdo->prepare($sqlUser);
    $stmtUser->execute([$username]);
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if ($user) {
        $userid = $user['id'];

        // Fetch hikes uploaded by the user
        $sqlHikes = "SELECT * FROM hikes WHERE memberid = ?";
        $stmtHikes = $pdo->prepare($sqlHikes);
        $stmtHikes->execute([$userid]);
        $hikes = $stmtHikes->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Redirect to homepage if user does not exist
        header("Location: index.php");
        exit();
    }
} else {
    // Redirect to homepage if username is not provided
    header("Location: index.php");
    exit();
}
?>

<body>
    <?php include './includes/nav.inc'; ?>

    <main class="details-container">
        <div class="collection-main">
            <h2><?php echo htmlspecialchars($user['username']); ?>'s Collection</h2>
            
            <?php foreach ($hikes as $hike): ?>
            <div class="collection-box">
                
            <div class="details-left">
                
                <img src="<?php echo htmlspecialchars($hike['image']); ?>" alt="<?php echo htmlspecialchars($hike['hikename']); ?>" class="hike-image">
                <div class="hike-infos">
                    <div class="hike-info">
                        <div class="material-symbols-outlined">hiking</div>
                        <div><?php echo htmlspecialchars($hike['distance']); ?> km</div>
                    </div>

                    <div class="hike-info">
                        <span class="material-symbols-outlined">landscape</span>
                        <div><?php echo htmlspecialchars($hike['level']); ?></div>
                    </div>

                    <div class="hike-info">
                        <div class="material-symbols-outlined">location_on</div>
                        <div><?php echo htmlspecialchars($hike['location']); ?></div>
                    </div>
                    
                </div>
            </div>

            <div>
                    <h2 class="hike-name"><?php echo htmlspecialchars($hike['hikename']); ?></h2>
                    <p class="hike-description"><?php echo htmlspecialchars($hike['description']); ?></p>
                </div>
            </div>

            
            <?php endforeach; ?>
        </div>

        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
</body>
</html>
