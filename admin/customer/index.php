<?php
include '../../includes/auth-check.php';
include '../../config/database.php';

$search = '';
if (isset($_GET['search'])) {
  $search = $_GET['search'];
}

$query = mysqli_query($conn, 
  "SELECT * FROM customers 
   WHERE name LIKE '%$search%' 
      OR email LIKE '%$search%' 
      OR phone LIKE '%$search%'
   ORDER BY id DESC"
);
?>

<link rel="stylesheet" href="../../assets/css/style.css">

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>


<div class="main-content">
  <h3>Customers</h3>
  <a href="add.php" class="btn btn-primary mb-3">+ Add Customer</a>
  <a href="../dashboard.php" class="btn btn-primary mb-3"> kembali</a>

<form method="GET" class="mb-3">
  <div class="input-group">
    <input type="text" name="search" value="<?= $search; ?>" 
           class="form-control" placeholder="Search customer...">
    <button class="btn btn-outline-secondary">Search</button>
  </div>
</form>

  <table class="table table-bordered bg-white shadow-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while($row = mysqli_fetch_assoc($query)) : ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td>
          <?php
$statusColor = [
  'New' => 'primary',
  'Follow Up' => 'warning',
  'Closed' => 'success'
];
?>

<span class="badge bg-<?= $statusColor[$row['status']]; ?>">
  <?= $row['status']; ?>
</span>
        </td>
        <td>
           <a href="../followup/history.php?customer_id=<?= $row['id']; ?>" 
     class="btn btn-info btn-sm">
     Follow Up
  </a>
  <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
  <a href="delete.php?id=<?= $row['id']; ?>" 
     class="btn btn-danger btn-sm"
     onclick="return confirm('Hapus customer ini?')">
     Delete
  </a>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include '../../includes/footer.php'; ?>
