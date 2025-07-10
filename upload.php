<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: login.php");
  exit;
}

$uploadDir = "uploads/";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!empty($_FILES['file']['name'])) {
    $filename = basename($_FILES['file']['name']);
    $targetFile = $uploadDir . $filename;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowed = ['pdf', 'jpg', 'jpeg', 'png', 'mp4', 'txt', 'html'];
    if (!in_array($fileType, $allowed)) {
      $message = "❌ File type not allowed.";
    } elseif (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
      $message = "✅ File uploaded successfully!";
    } else {
      $message = "❌ Upload failed.";
    }
  } else {
    $message = "⚠️ Please select a file.";
  }
}
?>
<!DOCTYPE html>
<html>
<head><title>Upload Content</title></head>
<body>
  <h2>📤 Upload Content</h2>
  <?php if ($message) echo "<p>$message</p>"; ?>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required><br><br>
    <button type="submit">Upload</button>
  </form>

  <h3>📁 Uploaded Files</h3>
  <ul>
    <?php
      foreach (glob("uploads/*") as $file) {
        $name = basename($file);
        echo "<li><a href='$file' target='_blank'>$name</a></li>";
      }
    ?>
  </ul>

  <p><a href="admin.php">← Back to Dashboard</a></p>
</body>
</html>
