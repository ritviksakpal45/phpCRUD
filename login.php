<?php
include ("./Structure/navbar.php");
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    include ("./dbconnect.php");

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['uid'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid email or password!";
        }
    } else {
        $error_message = "Invalid email or password!";
    }
    $conn->close();
}
?>
<?php
include "./Structure/header.php";
?>


<body>

    <div class="container">
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form method="post" class="pt-3">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                    aria-describedby="passwordHelpBlock">
            </div>

            <div class="mb-3 pt-3">
                <button type="submit" class="btn btn-primary">login</button>
            </div>
        </form>
    </div>
    <?php
    include "./Structure/scripts.php";
    ?>
</body>

</html>