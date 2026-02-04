<?php
include '../includes/auth-check.php';
include '../config/database.php';

// Statistik
$totalCustomer = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT COUNT(*) as total FROM customers")
)['total'];

$newCustomer = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT COUNT(*) as total FROM customers WHERE status='New'")
)['total'];

$followUpCustomer = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT COUNT(*) as total FROM customers WHERE status='Follow Up'")
)['total'];

$closedCustomer = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT COUNT(*) as total FROM customers WHERE status='Closed'")
)['total'];
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<?php include '../includes/topbar.php'; ?>



<div class="main-content">
  <h2>Dashboard</h2>
  <p>Welcome, <strong><?= $_SESSION['user']['name']; ?></strong></p>

  <div class="row mt-4">
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6>Total Customers</h6>
          <h3><?= $totalCustomer; ?></h3>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6>New</h6>
          <h3><?= $newCustomer; ?></h3>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6>Follow Up</h6>
          <h3><?= $followUpCustomer; ?></h3>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6>Closed</h6>
          <h3><?= $closedCustomer; ?></h3>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
