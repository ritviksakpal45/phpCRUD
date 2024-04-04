<?php
include "./Structure/header.php";
?>


<body>

    <?php
    include ("./Structure/navbarReg.php");
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $contact = htmlspecialchars($_POST['contact']);
        $gender = htmlspecialchars($_POST['gender']);
        $city = htmlspecialchars($_POST['city']);
        $password = htmlspecialchars($_POST['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);


        include ("./dbconnect.php");

        $sql = "INSERT INTO `users` (`name`, `email`, `contact`, `gender`, `city`, `password`) VALUES ('$name', '$email', '$contact', '$gender', '$city', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> The user has been registered successfully! <a href="./login.php">Login?</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>Invalid method, kindly please try again with correct method.

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }

    ?>
    <div class="container">
        <form action="./index.php" class="px-5" method="POST" onsubmit="return validateForm()">
            <h2 class="pt-3">Register with us!</h2>
            <div class="mb-3 pt-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Full name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Enter your 10-digit contact number:</label>
                <input type="tel" class="form-control" id="contact" name="contact" placeholder="0123456789"
                    pattern="[0-9]{10}" required>
                <div class="invalid-feedback">
                    Please enter a valid 10-digit contact number.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                    <label class="form-check-label" for="other">
                        Other
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter your City">
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Enter password:</label>
                <input type="password" class="form-control" id="password1" name="password" placeholder="Enter password"
                    required>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Confirm password:</label>
                <input type="password" class="form-control" id="password2" name="password"
                    placeholder="Confirm password" required>
                <div id="passwordError" class="text-danger"></div>
            </div>

            <div class="mb-3 pt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <?php
    include "./Structure/scripts.php";
    ?>
</body>

</html>