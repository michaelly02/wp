<?php include './includes/header.inc'; ?>

<body>
    <?php include './includes/nav.inc'; ?>
    <?php include("db_connect.inc"); ?>
    <main class="login-container">
        <div class="login-intro">

            <h2>Register</h2>

            <?php
            if (isset($_POST['register'])) {
                // Retrieve the form data
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Hash the password with SHA-256
                $passwordHash = hash('sha256', $password);

                try {
                    // Check if the username already exists
                    $stmt = $pdo->prepare("SELECT COUNT(*) FROM member WHERE username = :username");
                    $stmt->bindParam(':username', $username);
                    $stmt->execute();
                    $userExists = $stmt->fetchColumn();

                    if ($userExists) {
                        echo "<p>Username already exists!</p>";
                    } else {
                        // Prepare an insert statement
                        $stmt = $pdo->prepare("INSERT INTO member (username, password) VALUES (:username, :password)");

                        // Bind parameters
                        $stmt->bindParam(':username', $username);
                        $stmt->bindParam(':password', $passwordHash);

                        // Execute the statement
                        if ($stmt->execute()) {
                            // Registration successful, redirect to index.php with success parameter
                            header('Location: index.php?registered=success');
                            exit;
                        } else {
                            echo "<p>Registration failed!</p>";
                        }
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
            ?>
            
            <form action="" method="post" class="login-form">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit" name="register">Register</button>
            </form>

        </div>
        
        <?php include './includes/footer.inc'; ?>
    </main>

    <script src="./main.js"></script>
</body>

</html>
