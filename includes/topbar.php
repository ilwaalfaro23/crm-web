<div class="topbar">
  <div class="topbar-left">
    <h5>Dashboard</h5>
  </div>

 <div class="topbar-right">
  <div class="avatar-wrapper">
    <div class="avatar" id="avatarBtn">
      <?= strtoupper(substr($_SESSION['user']['name'], 0, 1)); ?>
    </div>

    <div class="avatar-dropdown" id="avatarDropdown">
      <div class="dropdown-header">
        <strong><?= $_SESSION['user']['name']; ?></strong>
        <small><?= $_SESSION['user']['email']; ?></small>
      </div>
      <hr>
      <a href="../admin/profile/index.php" class="dropdown-item">Profile</a>
      <a href="../auth/logout.php" class="dropdown-item logout">Logout</a>
    </div>
  </div>
</div>

</div>

