<?php

session_start();
require("../../Database_conn/databaseConn.php");
$faculty_id = $_SESSION['faculty_id'];
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

//GET DETAILS FROM THE DATABASE
function getDetail($conn, $faculty_id, $key)
{
    $query = "SELECT $key FROM faculty WHERE faculty_id= '$faculty_id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $data = mysqli_fetch_assoc($result);
    return $data["$key"];
}
function getCourseDetail($conn, $faculty_id, $key)
{
    $query = "SELECT $key FROM courses WHERE faculty_id= '$faculty_id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $data = mysqli_fetch_assoc($result);
    return $data["$key"];
}
$name = getDetail($conn, $faculty_id, 'name');
$faculty_id = getDetail($conn, $faculty_id, 'faculty_id');
$image =  getDetail($conn, $faculty_id, 'image');
$filename = "../../upload/$image";
$image = file_exists($filename) ? "$filename" : '../../public/avtar.png';
$email = getDetail($conn, $faculty_id, 'email');
$course = getCourseDetail($conn, $faculty_id, 'course_name');
$department = getDetail($conn, $faculty_id, 'department');

function sidebar($name, $department, $course, $image){
    echo "<nav class='menu' tabindex='0'>
        <div class='smartphone-menu-trigger'></div>
        <header class='avatar'>
            <img src='" . $image . "' />
            <span>
                <h1 style='margin-bottom: 0;'>
                    $name
</h1>
<view style='display: grid;'>
    <view style='margin: 5px 0 15px 85px;padding:2px;width:50px;border: 1px solid white;border-radius: 25px;'>
        <p style='font-size: 0.6em;margin: 0;text-align: center;'>2023-24</p>
    </view>
    <view style='margin:5px;padding:5px;border: 1px solid white;border-radius: 25px;'>
        <h5 style='margin:0'>
            $department
        </h5>
    </view>
    <view style='margin:5px;padding:5px;border: 1px solid white;border-radius: 25px;'>
        <h5 style='margin:0'>
            $course
        </h5>
    </view>
</view>
</span>
</header>
<ul>
    <a style='text-decoration: none;color: white;' href='../components/sidebar.php?redirect=dashboard'>
        <li tabindex='0' class='icon-dashboard'><span>Dashboard</span></li>
    </a>
    <a style='text-decoration: none;color: white;' href='../components/sidebar.php?redirect=profile'>
        <li tabindex='0' class='icon-customers'><span>Profile</span></li>
    </a>
    <a style='text-decoration: none;color: white;' href='../components/sidebar.php?redirect=marks'>
        <li tabindex='0' class='icon-users'><span>Add Marks</span></li>
    </a>
    <a style='text-decoration: none;color: white;' href='../components/sidebar.php?logout=true'>
        <li tabindex='0' class='icon-settings'><span>Log Out</span></li>
    </a>
</ul>
</nav>";
}
?>