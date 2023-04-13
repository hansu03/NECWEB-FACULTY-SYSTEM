<?php
require("../components/sidebar.php");
if (!isset($_SESSION['faculty_id'])) {
    header("Location: ../login/index.php");
}
if (isset($_GET['redirect'])) {
    $path = $_GET['redirect'];
    header("Location: ../$path/$path.php");
}
if (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../login/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/global.css">
</head>

<body>
    <div>
        <?php
    sidebar($name, $department, $course, $image)
    ?>
    </div>

    <main>
        <div class="nec_card">
            <div class="nec_box">
                <div class="nec_content">
                    <h3>Card Name</h3>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="nec_card">
            <div class="nec_box">
                <div class="nec_content">
                    <h3>Card Name</h3>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="nec_card">
            <div class="nec_box">
                <div class="nec_content">
                    <h3>Card Name</h3>
                    <p></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>