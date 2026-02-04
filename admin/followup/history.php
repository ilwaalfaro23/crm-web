<?php
include '../../includes/auth-check.php';
include '../../config/database.php';

$customer_id = $_GET['customer_id'];

$customer = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM customers WHERE id='$customer_id'")
);

$followups = mysqli_query($conn, 
  "SELECT * FROM followups 
   WHERE customer_id='$customer_id' 
   ORDER BY id DESC"
);
?>

<link rel="stylesheet" href="../../assets/css/style.css">
<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="main-content">
  <h3>Follow Up History</h3>

  <div class="card mb-3">
    <div class="card-body">
      <strong><?= $customer['name']; ?></strong><br>
      <?= $customer['email']; ?> | <?= $customer['phone']; ?>
    </div>
  </div>

  <a href="add.php?customer_id=<?= $customer_id; ?>" 
     class="btn btn-primary mb-3">
     + Add Follow Up
  </a>

  <table class="table table-bordered bg-white shadow-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Note</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while($row = mysqli_fetch_assoc($followups)) : ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['note']; ?></td>
        <td><?= date('d M Y H:i', strtotime($row['created_at'])); ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <a href="../customer/index.php" class="btn btn-secondary mt-3">Back</a>
</div>

<?php include '../../includes/footer.php'; ?>
