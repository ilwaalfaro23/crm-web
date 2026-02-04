

<div class="sidebar">

  
  <h4 class="text-white text-center py-3">CRM Admin</h4>
  <?php
$currentPath = $_SERVER['PHP_SELF'];


// Kalau sedang di subfolder admin (profile, customer, followup)
$isSubFolder = strpos($currentPath, '/admin/profile/') !== false
            || strpos($currentPath, '/admin/customer/') !== false
            || strpos($currentPath, '/admin/followup/') !== false;

$base = $isSubFolder ? '../' : '';
?>

<ul class="sidebar-menu">
  <li><a href="<?= $base ?>dashboard.php">Dashboard</a></li>
  <li><a href="<?= $base ?>customer/index.php">Customer</a></li>
  <li><a href="<?= $base ?>profile/index.php">Profile</a></li>
</ul>

</div>
