<?php
include '../../includes/auth-check.php';
include '../../config/database.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM customers WHERE id='$id'")
);

if (isset($_POST['submit'])) {
  $name   = $_POST['name'];
  $email  = $_POST['email'];
  $phone  = $_POST['phone'];
  $status = $_POST['status'];
  $notes  = $_POST['notes'];

  mysqli_query($conn, "UPDATE customers SET
    name='$name',
    email='$email',
    phone='$phone',
    status='$status',
    notes='$notes'
    WHERE id='$id'
  ");

  header("Location: index.php");
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="main-content">
  <h3>Edit Customer</h3>

  <form method="POST">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control">
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" value="<?= $data['email']; ?>" class="form-control">
    </div>

    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" value="<?= $data['phone']; ?>" class="form-control">
    </div>

    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control">
        <option <?= $data['status']=='New'?'selected':''; ?>>New</option>
        <option <?= $data['status']=='Follow Up'?'selected':''; ?>>Follow Up</option>
        <option <?= $data['status']=='Closed'?'selected':''; ?>>Closed</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Notes</label>
      <textarea name="notes" class="form-control"><?= $data['notes']; ?></textarea>
    </div>

    <button name="submit" class="btn btn-warning">Update</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
  </form>
</div>

<?php include '../../includes/footer.php'; ?>
