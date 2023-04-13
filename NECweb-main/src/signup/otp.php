<?php

require("../../Database_conn/databaseConn.php");
$otp = $_POST["otp"];
$otp_error = false;

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM faculty_verification WHERE email= '$email';";
    $result = mysqli_query($conn, $query);
    echo $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $conf_otp = $row['otp'];
        $otp_expiry = $row['otp_expiry'];
        $pass = $row['password'];
        // get current time as Unix timestamp
        $current_timestamp = time();

        // calculate difference in minutes
        $diff_minutes = abs($current_timestamp - $otp_expiry) / 60;
    }

    $otp = $_POST["otp"];
    $otp_error = false;

    if ($otp == $conf_otp) {
        $sql = "UPDATE faculty SET password='$pass' where email='$email'";

        if (mysqli_query($conn, $sql)) {
            echo ("<script> alert('Account Created')</script>");
            header("Location: ../dashboard/dashboard.php");
        } else {
            echo ("<script> alert('error: " . $sql . "<br>" . mysqli_error($conn) . "')</script>");
        }
    }else {
        echo "<script>alert('Wrong OTP or Expired')</script>";
    }
}

    if (isset($_POST['signup'])) {
        header("Location: signup.php");
    }

    if (isset($_POST['signin'])) {
        header("Location: ../login");
    }
?>
<html>

<head>
    <style>
    ::-webkit-scrollbar {
        width: 0.2em;
        background-color: transparent;
    }

    header {
        display: flex;
    }

    .logo {
        position: absolute;
        left: 0;
        top: 0;
        padding: 0;
        margin: 0;
        cursor: pointer;
        width: 100px;
    }

    .button-container {
        margin-left: 82%;
        margin-top: 15px;
        padding: 0;
    }

    .signup-button,
    .signin-button {
        padding: 10px 20px;
        font-size: 1.2rem;
        border: 1px solid;
        border-radius: 5px;
        margin: 0 5px;
        cursor: pointer;
    }

    .signin-button {
        background-color: white;
        border-color: black;
        color: black;
    }

    .signup-button {
        background-color: #052963;
        border-color: white;
        color: white;
    }

    .signup-button:hover,
    .signin-button:hover {
        opacity: 0.5;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .form {
        border: 1px solid white;
        padding: 4vw;
        margin-top: 5vh;
        margin-left: 30vw;
        margin-right: 30vw;
        background-color: #f2f2f2;
        border-radius: 10px;
    }

    input {
        background-color: white;
        margin-left: 30px;
        border: 1px solid black;
        padding: 12px 20px;
        margin-bottom: 20px;
        margin-top: 10px;
        width: 29.30vw;
        border-radius: 5px;
    }

    .field {
        display: block;
    }

    label {
        color: black;
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .error {
        font-size: 0.7rem;
        color: red;
        text-align: left;
        margin-top: 0;
        margin-bottom: 10px;
        margin-left: 43px;
    }

    .submit_button {
        margin: 0;
        width: 12vw;
        height: 3vw;
        margin-top: 10px;
        background-color: #052963;
        color: white;
        padding: 14px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .submit_button:hover {
        background-color: #000a1b;
    }

    @media (max-width: 600px) {
        .form {
            margin-left: 5vw;
            margin-right: 5vw;
        }

        input {
            width: 90%;
        }
    }
    </style>
</head>

<body style="background-color: #052963; color: black;">
    <header>
        <img class="logo" alt="logo" src="./logo.png" />
    </header>
    <div class="form">
        <p style="font-size:3rem; margin-left:0px;">Validate OTP</p>
        <form action="otp.php" method="POST">
            <div class="field">
                <label>OTP:</label>
                <input type="number" value="" placeholder="OTP" name="otp" required>
            </div>
            <input type="submit" value="Submit" class="submit_button" />
        </form>
    </div>
</body>

</html>