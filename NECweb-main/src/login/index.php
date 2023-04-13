<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['signup'])) {
            header("Location: ../signup/signup.php");
        } else if (isset($_POST['signin'])) {
            header("Location: ");
        }
    }

?>
<html>

<head>
    <style>
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
        display: 'flex';
        justify-content: 'center';
        align-items: 'center';
        padding: 20px;
        margin-top: 5vh;
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
        display: flex;
        flex-direction: 'column';
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
            width: 80vw !important;
        }

        .field {
            width: 100%;
        }

        .field input {
            display: block;
            width: 80% !important;
        }

        .field label {
            width: 100%;
        }
    }
    </style>
</head>

<body style="background-color: #052963; color: black;">
    <header>
        <img class="logo" alt="logo" src="./logo.png" />
        <div class="button-container">
            <form method="post" action="index.php">
                <button class="signup-button" name="signup">Sign Up</button>
                <button class="signin-button" name="signin">Sign In</button>
            </form>
        </div>
    </header>
    <div class="form">
        <p style="font-size:3rem; margin-left:0px;">Sign In</p>
        <form action="login.php" method="POST">
            <div class="field">
                <label>User ID:</label>
                <input type="text" value="" placeholder="user id" name="username" required>
            </div>
            <div class="field">
                <label>Password:</label>
                <input type="password" value="" placeholder="password" name="password" required>
                <?php
            if (isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php
                
            }
            ?>
            </div>
            <input type="submit" value="Submit" class="submit_button">
        </form>
    </div>
</body>

</html>