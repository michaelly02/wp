<?php include './includes/header.inc'; ?>

<body>
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
        <?php
            // Include database connection
            include("db_connect.inc");

            // Query to retrieve hike data
            $sql = "SELECT * FROM hikes";
            $stmt = $pdo->query($sql);

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




        <!-- <div class="gallery-wrapper">
            <a class="box">
                <img src="./img/falls.jpg" alt="Werribee Gorge Circuit Walk">
                <div class="caption">Werribee Gorge Circuit Walk</div>
            </a>
            <a class="box">
                <img src="./img/capewoolamai.jpg" alt="Cliff, Woodland and Quarry Tracks">
                <div class="caption">Cliff, Woodland and Quarry Tracks </div>
            </a>
            <a class="box">
                <img src="./img/lyrebird.jpg" alt="Lyrebird Track">
                <div class="caption">Lyrebird Track </div>
            </a>
            <a class="box">
                <img src="./img/keppellookout.jpg" alt="Keppel Lookout Trail">
                <div class="caption">Keppel Lookout Trail</div>
            </a>
            <a class="box">
                <img src="./img/grampians.jpg" alt="The Pinnacle Walk & Lookout">
                <div class="caption">The Pinnacle Walk & Lookout</div>
            </a>
            <a class="box">
                <img src="./img/prom.jpg" alt="Millers Landing Nature Walk">
                <div class="caption">Millers Landing Nature Walk</div>
            </a>

        </div> -->

        <?php include './includes/footer.inc'; ?>
    </main>






    <script src="./main.js"></script>
</body>

</html>