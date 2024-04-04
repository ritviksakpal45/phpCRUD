<?php
include ("./Structure/navbarDashboard.php");
session_start(); // Start or resume the session

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: logout.php");
    exit();
}

include ("./dbconnect.php");

// Fetch user's name based on user_id from session
$user_id = $_SESSION['user_id'];
$sql = "SELECT name FROM users WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<?php
include "./Structure/header.php";
?>

<body>
    <div class="container">
        <h3>Welcome
            <?php echo $name; ?>
            </h1>
    </div>
    <?php
    include "./Structure/scripts.php";
    ?>
</body>

</html>