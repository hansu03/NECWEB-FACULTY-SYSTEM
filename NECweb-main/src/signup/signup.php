<?php

require("../../Database_conn/databaseConn.php");
$email = $_POST["email"];
$pass = $_POST["pass"];
$confirm_pass = $_POST["confirm_pass"];
$error_email = false;
$match = true;
$error_pass = false;
$error_confirm_pass = false;

    function validatePassword($pass)
    {
        if (strlen($pass) < 8) {
            return true;
        } elseif (!preg_match("#[0-9]+#", $pass)) {
            return true;
        } elseif (!preg_match("#[a-zA-Z]+#", $pass)) {
            return true;
        } elseif (!preg_match('/[^a-zA-Z\d]/', $pass)) {
            return true;
        } else {
            return false;
        }
    }


    function confirm_password($confirm_pass, $pass)
    {
        if ($pass != $confirm_pass) {
            return true;
        } else {
            return false;
        }
    }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error_pass = validatePassword($pass);
    $error_confirm_pass = confirm_password($confirm_pass, $pass);

    $query = "SELECT email FROM faculty WHERE email= '$email';";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 0){
        $match=false;
    }

    if ($error_pass == false && $error_confirm_pass == false && $match == true) {

        $_SESSION['email'] = $email;
        $otp_time =  date('Y-m-d H:i:s');
        // Generate OTP
        $otp = rand(100000, 999999);

        // Email subject
        $subject = "Your One Time Password";

        // Email message
        $message = "Your OTP is: " . $otp;

        // Send email
        $headers = "From: nec_web_sender@gmail.com";
        $send = mail($email, $subject, $message, $headers);
        if($send){
        echo "OTP sent successfully to $email...";

        $sql = "INSERT INTO `faculty_verification` (email,password,otp,otp_expiry) 
                VALUES ('$email','$pass','$otp','$otp_expiry')";

        if (mysqli_query($conn, $sql)) {
            echo ("<script> alert('OTP was send on Your email')</script>");
            header("Location: ../otp");
        } else {
            echo ("<script> alert('error: " . $sql . "<br>" . mysqli_error($conn) . "')</script>");
        }
        } else {
        echo "<script>alert('Failed to send OTP...')</script>";
        }
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
        <div class="button-container">
            <form method="post" action="signup.php">
                <button class="signup-button" name="signup">Sign Up</button>
                <button class="signin-button" name="signin">Sign In</button>
            </form>
        </div>
    </header>
    <div class="form">
        <p style="font-size:3rem; margin-left:0px;">Sign Up</p>
        <form action="signup.php" method="POST">
            <div class="field">
                <label>Email:</label>
                <input type="text" value="" placeholder="email" name="email" required>
                <?php if (!$match) {
                    echo "</br><p class='error'>*Email didn't Exists </p>";
                } ?>
            </div>
            <div class="field"><label>Password:</label>
                <input type="password" value="" placeholder="password" name="pass" required>
                <?php if ($error_pass) {
                    echo "</br><p class='error'>*Weak password</p>";
                } ?>
            </div>
            <div class="field"><label>Confirm Password:</label>
                <input type="password" value="" placeholder="confirm password" name="confirm_pass" required>
                <?php if ($error_confirm_pass) {
                    echo "</br><p class='error'>*Passwords not match</p>";
                } ?>
            </div>
            <input type="submit" value="Submit" class="submit_button" />
        </form>
    </div>
</body>

</html>