<?php
    //include("db_connect.inc");

    // try {
    //     // Check if data already exists
    //     $sqlCheck = "SELECT COUNT(*) FROM hikes WHERE hikename IN (
    //                 'Werribee Gorge Circuit Walk',
    //                 'Cliff, Woodland and Quarry Tracks',
    //                 'Lyrebird Track',
    //                 'Keppel Lookout Trail',
    //                 'The Pinnacle Walk & Lookout',
    //                 'Millers Landing Nature Walk'
    //             )";
    //     $stmtCheck = $pdo->query($sqlCheck);
    //     $count = $stmtCheck->fetchColumn();

    //     if ($count == 0) {
    //         // Data doesn't exist, insert it
    //         $sqlInsert = "INSERT INTO hikes (hikename, distance,  level, location, description,  caption, image) VALUES 
    //                     ('Werribee Gorge Circuit Walk', 10, 'Moderate', 'Meikles Point Picnic Area', 'Werribee Gorge State Park has a selection of shorter and long loop walks to choose from. All walks are Grade 3, meaning a moderate level of fitness is required, walking on uneven ground with many steps, some rock hopping and steep hill sections involved.',  'Werribee Gorge Circuit Walk', './img/werribee.jpg'),
    //                     ('Cliff, Woodland and Quarry Tracks', 8.9, 'Moderate', 'Cape Woolamai' , 'A hiking trail that offers a diverse terrain experience, encompassing rugged cliffs, serene woodland paths, and remnants of old quarries. ', 'Cliff, Woodland and Quarry Tracks', './img/capewoolamai.jpg'),
    //                     ('Lyrebird Track', 4.8, 'Easy', 'Upper Ferntree Gully', 'A tranquil hiking trail renowned for its serene ambiance and natural beauty. Named after the elusive lyrebird, this track meanders through lush forests and verdant valleys.', 'Lyrebird Track', './img/lyrebird.jpg'),
    //                     ('Keppel Lookout Trail', 11, 'Moderate', 'Marysville' , 'Invigorating hiking route renowned for its breathtaking panoramic views and moderate difficulty level. Located in Marysville, this trail winds its way through scenic landscapes, leading hikers to the captivating Keppel Lookout.', 'Keppel Lookout Trail', './img/keppellookout.jpg'),
    //                     ('The Pinnacle Walk & Lookout', 2.1, 'Easy', 'Grampians' , 'A renowned hiking trail nestled in the heart of the Grampians National Park, Australia.', 'The Pinnacle Walk & Lookout', './img/grampians.jpg'),
    //                     ('Millers Landing Nature Walk', 4.3, 'Easy', 'Wilsons Promontory' , 'This leisurely hike takes visitors on a tranquil journey through diverse ecosystems, including coastal woodlands, sandy beaches, and wetlands. As hikers meander along the trail, they have the opportunity to observe an array of native wildlife.', 'Millers Landing Nature Walk', './img/prom.jpg')";
                        
    //         $pdo->exec($sqlInsert);
            
    //     } else {
            
    //     }
    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    // }


    // $pdo = null;
?>

<?php
    include 'db_connect.inc'; // Include the database connection file

    try {
        // Fetch the 4 images with the highest hikeid from the database
        $stmt = $pdo->prepare("SELECT image FROM hikes ORDER BY hikeid DESC LIMIT 4");
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

    } catch(PDOException $e) {
        // Handle database connection errors
        echo "Error: " . $e->getMessage();
    }

?>

<?php include './includes/header.inc'; ?>
<body>
<?php include './includes/nav.inc'; ?>
    

     <main class="index-container">
        <div class="index-wrapper">
        
        
        <!-- <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/falls.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/apostles.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/prom.jpg" class="d-block w-100" alt="...">
                </div>
            </div>

            
        </div> -->

        
        
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Loop through the fetched images and generate carousel items
                $active = true; // To mark the first item as active
                foreach ($images as $image) {
                ?>
                <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                    <img src="<?php echo $image; ?>" class="d-block w-100" alt="...">
                </div>
                <?php
                $active = false; // Set active to false after the first item
                }
                ?>
            </div>
        </div>

            <div class="home-box">
                <h2 class="home-box-title">
                    Hikes Victoria
                </h2>
                <div class="home-intro">
                    WELCOME TO VICTORIA
                </div>
            </div>

            

            <!-- <div class="home-box">
                <img src="./img/apostles.jpg" alt="main img">
            </div> -->

            
        </div>

        
            <form action="search.php" method="GET" class="index-form">
                <input class="index-form-item"  type="text" id="search" name="search" placeholder="I am looking for">
                
                <select class="index-form-item" id="level" name="level">
                    <option value="">Select level of adventure</option>
                    <option value="easy">Easy</option>
                    <option value="moderate">Moderate</option>
                    <option value="hard">Hard</option>
                </select>
                
                <button type="submit" class="index-form-button" >Search</button>
            </form>

            <div class="index-intro">

            <h2>Discover Victoria your own way</h2>
            <p>
                Victoria, Australia, is a haven for hiking enthusiasts, boasting an array of trails that cater to
                various preferences and skill levels. From coastal paths to mountain tracks, Victoria offers diverse
                landscapes that promise unforgettable outdoor experiences. Whether you're seeking a leisurely stroll
                through lush forests or an adrenaline-pumping ascent to panoramic viewpoints, Victoria's hiking trails
                invite exploration and discovery amidst its natural wonders.
            </p>

        </div>
        

        <?php include './includes/footer.inc'; ?>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./main.js"></script>
</body>
</html>