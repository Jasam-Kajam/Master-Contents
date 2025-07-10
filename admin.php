<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body>
  <h1>🔧 Welcome, Admin!</h1>
  <ul>
    <li><a href="upload.php">📤 Upload Content</a></li>
    <li><a href="logout.php">🚪 Logout</a></li>
  </ul>
  <p><a href="index.php">← Back to Home</a></p>
</body>
</html>
