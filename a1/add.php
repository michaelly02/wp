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
                <form>
                    <label class="required" for="hname">Hike Name </label><br>
                    <input type="text" id="hname" name="hname" required placeholder="Name of hike"><br>
                    <label class="required" for="description">Description </label><br>
                    <textarea id="description" name="description" required placeholder="Describe the hike"></textarea><br>

                    <label class="required" for="select-image">Select an image </label><br>
                    <input type="file" id="select-image" name="select-image" required><br>

                    <label class="required" for="image-caption">Image Caption </label><br>
                    <input type="text" id="image-caption" name="image-caption" required><br>

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