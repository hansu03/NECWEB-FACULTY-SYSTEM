<?php
require("../components/sidebar.php");
if(isset($_POST['marks']) && isset($_POST['enrollment_number'])){
    $sql = "UPDATE marks SET marks = $_POST[marks] WHERE enrollment_number = '$_POST[enrollment_number]';";
    $result1 = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM marks WHERE marks = $_POST[marks] && enrollment_number = '$_POST[enrollment_number]';";
    $result2 = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result2);
    echo json_encode($data);
}
?>