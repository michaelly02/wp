<?php
// Include header
include './includes/header.inc';
include './includes/nav.inc';
// Include database connection
include("db_connect.inc");
?>

<main class="login-container">
    
    <div class="login-intro">
        <h2>Login</h2>
        <?php
        if (isset($_POST['login'])) {
            // Retrieve the form data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Hash the password with SHA-256
            $passwordHash = hash('sha256', $password);

            try {
                // Check if the username and password match an existing user
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM member WHERE username = :username AND password = :password");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $passwordHash);
                $stmt->execute();
                $userExists = $stmt->fetchColumn();

                if ($userExists) {
                    // Login successful, set session variables
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;

                    // Retrieve the user ID and set it in the session
                    $stmt = $pdo->prepare("SELECT id FROM member WHERE username = :username");
                    $stmt->bindParam(':username', $username);
                    $stmt->execute();
                    $id = $stmt->fetchColumn();
                    $_SESSION['id'] = $id;

                    // Redirect to index.php with success parameter
                    header('Location: index.php?login=success');
                    exit;
                } else {
                    echo "<p>Invalid username or password!</p>";
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
            
            <button type="submit" name="login">Login</button>
        </form>
    </div>
    <?php include './includes/footer.inc'; ?>
</main>
<script src="./main.js"></script>
</body>
</html>
