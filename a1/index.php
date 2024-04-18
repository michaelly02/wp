<?php
    include("db_connect.inc");

    try {
        // Check if data already exists
        $sqlCheck = "SELECT COUNT(*) FROM hikes WHERE hikename IN (
                    'Werribee Gorge Circuit Walk',
                    'Cliff, Woodland and Quarry Tracks',
                    'Lyrebird Track',
                    'Keppel Lookout Trail',
                    'The Pinnacle Walk & Lookout',
                    'Millers Landing Nature Walk'
                )";
        $stmtCheck = $pdo->query($sqlCheck);
        $count = $stmtCheck->fetchColumn();

        if ($count == 0) {
            // Data doesn't exist, insert it
            $sqlInsert = "INSERT INTO hikes (hikename, distance,  level, location, description,  caption, image) VALUES 
                        ('Werribee Gorge Circuit Walk', 10, 'Moderate', 'Meikles Point Picnic Area', 'Werribee Gorge State Park has a selection of shorter and long loop walks to choose from. All walks are Grade 3, meaning a moderate level of fitness is required, walking on uneven ground with many steps, some rock hopping and steep hill sections involved.',  'Werribee Gorge Circuit Walk', './img/falls.jpg'),
                        ('Cliff, Woodland and Quarry Tracks', 8.9, 'Moderate', 'Cape Woolamai' , 'A hiking trail that offers a diverse terrain experience, encompassing rugged cliffs, serene woodland paths, and remnants of old quarries. ', 'Cliff, Woodland and Quarry Tracks', './img/capewoolamai.jpg'),
                        ('Lyrebird Track', 4.8, 'Easy', 'Upper Ferntree Gully', 'A tranquil hiking trail renowned for its serene ambiance and natural beauty. Named after the elusive lyrebird, this track meanders through lush forests and verdant valleys.', 'Lyrebird Track', './img/lyrebird.jpg'),
                        ('Keppel Lookout Trail', 11, 'Moderate', 'Marysville' , 'Invigorating hiking route renowned for its breathtaking panoramic views and moderate difficulty level. Located in Marysville, this trail winds its way through scenic landscapes, leading hikers to the captivating Keppel Lookout.', 'Keppel Lookout Trail', './img/keppellookout.jpg'),
                        ('The Pinnacle Walk & Lookout', 2.1, 'Easy', 'Grampians' , 'A renowned hiking trail nestled in the heart of the Grampians National Park, Australia.', 'The Pinnacle Walk & Lookout', './img/grampians.jpg'),
                        ('Millers Landing Nature Walk', 4.3, 'Easy', 'Wilsons Promontory' , 'This leisurely hike takes visitors on a tranquil journey through diverse ecosystems, including coastal woodlands, sandy beaches, and wetlands. As hikers meander along the trail, they have the opportunity to observe an array of native wildlife.', 'Millers Landing Nature Walk', './img/prom.jpg')";
                        
            $pdo->exec($sqlInsert);
            
        } else {
            
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    $pdo = null;
?>

<?php include './includes/header.inc'; ?>
<body>
    <?php include './includes/nav.inc'; ?>
    

     <main class="home-container">
        <div class="home-wrapper">
            <div class="home-box">
                <h2>
                    Hikes Victoria
                </h2>
                <div class="home-intro">
                    WELCOME TO VICTORIA
                </div>
            </div>

            <div class="home-box">
                <img src="./img/apostles.jpg" alt="main img">
            </div>
        </div>

        <?php include './includes/footer.inc'; ?>
    </main>



    
    <script src="./main.js"></script>
</body>
</html>