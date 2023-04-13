<?php
session_start();
if (isset($_SESSION['faculty_id'])) {
    header("Location: src/dashboard/dashboard.php");
} else {
    header("Location: src/login");
}
?>