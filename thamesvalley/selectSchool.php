<?php
session_start();
if (($_POST['username'] != "User")) {
    header("Location: http://www.firstclassplanners.ca/thamesvalley/index.php?error");
} else if (($_POST['pass'] != "Pass")) {
    header("Location: http://www.firstclassplanners.ca/thamesvalley/index.php?error");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Select School</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Thames Valley Portal
                </span>
                <form action="order.php" method="post" class="login100-form validate-form p-b-33 p-t-5">
                    <div class="container">

                        <div class="wrap-input100 validate-input" data-validate="Enter username">
                            Select School
                            <select class="form-control" name="school" id="school">
                                <?php
                                $servername = "localhost";
                                $username = "firstcn1_admin";
                                $password = "P@ssw0rd";
                                $dbname = "firstcn1_SchoolList";

                                // Create connection
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                                $_SESSION["conn"] = $conn;
                                // Check connection
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = "SELECT School_name FROM thamesvalley ORDER BY School_name";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row["School_name"] . "'>" . $row["School_name"] . "</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Contact Name">
                            <input class="input100" type="text" name="name" placeholder="Contact Name">
                            <span class="focus-input100" data-placeholder="⚇"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Enter email">
                            <input class="input100" type="email" name="email" placeholder="Enter Email">
                            <span class="focus-input100" data-placeholder="&#x2709"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-32">
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                        <div class="container-login100-form-btn m-t-32">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>