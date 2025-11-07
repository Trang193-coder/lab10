<?php
session_start();
require_once("settings.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $new_email = $_POST['email'];

    $sql = "UPDATE users SET email='$new_email' WHERE username='$username'";

    if (mysqli_query($conn, $sql)) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
