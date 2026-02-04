<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location: ../admin/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="login-box">
  <h2>Admin Login</h2>

  <?php if (isset($_GET['error'])) : ?>
    <p class="error">Email atau password salah</p>
  <?php endif; ?>

  <form action="login-process.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
</div>

</body>
</html>
