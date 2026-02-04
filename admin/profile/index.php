<?php
session_start();
include '../../config/database.php';

$user = $_SESSION['user'];
?>

<link rel="stylesheet" href="../../assets/css/style.css">

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/topbar.php'; ?>

<div class="main-content">
  <div class="profile-container">
    <div class="profile-card">
      <h4 class="profile-title">Profile Admin</h4>

      <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">

        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="name" value="<?= $user['name']; ?>" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="<?= $user['email']; ?>" required>
        </div>

        <div class="divider"></div>

        <div class="form-group">
          <label>Password Baru</label>
          <input type="password" name="password" placeholder="Kosongkan jika tidak diganti">
        </div>

        <button class="btn-primary-full">Update Profile</button>
      </form>
    </div>
  </div>
</div>

