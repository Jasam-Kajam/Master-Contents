<?php
session_start();
$correct_password = "master123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['password'] === $correct_password) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin.php");
    exit;
  } else {
    $error = "❌ Incorrect password!";
  }
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Login</title></head>
<body>
  <h2>🔐 Admin Login</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="POST">
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
  <p><a href="index.php">← Back to Home</a></p>
</body>
</html>
