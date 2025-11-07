
<?php
session_start();
require_once("settings.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "User not found.";
    exit();
}
?>
<h2>Edit Profile</h2>
<form method="post" action="update_profile.php">
    <p><strong>Username:</strong> <?php echo htmlspecialchars($row['username']); ?></p>
    <label for="email">New Email:</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>
<a href="profile.php">Cancel</a>


