<?php
session_start();
require_once("settings.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "User not found.";
    exit();
}

?>
<?php if (!isset($row)) { echo "No user data."; return; } ?>
<h2>Profile Page</h2>
<p><strong>Username:</strong> <?php echo htmlspecialchars($row['username']); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>

<a href="edit_profile.php">Edit Profile</a><br><br>
<a href="logout.php">Logout</a>
