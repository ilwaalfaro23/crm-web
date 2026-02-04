<?php
include '../../includes/auth-check.php';
include '../../config/database.php';

if (isset($_POST['submit'])) {
  $name   = $_POST['name'];
  $email  = $_POST['email'];
  $phone  = $_POST['phone'];
  $status = $_POST['status'];
  $notes  = $_POST['notes'];

  mysqli_query($conn, "INSERT INTO customers 
    (name, email, phone, status, notes) 
    VALUES ('$id',$name','$email','$phone','$status','$notes')");

  header("Location: index.php");
}
?>
<link rel="stylesheet" href="../../assets/css/style.css">
<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="main-content">
  <h3>Add Customer</h3>

  <form method="POST">
    <div class="mb-3">
      <label>id</label>
      <input type="text" name="id" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control">
        <option>New</option>
        <option>Follow Up</option>
        <option>Closed</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Notes</label>
      <textarea name="notes" class="form-control"></textarea>
    </div>

    <button name="submit" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
  </form>
</div>

<?php include '../../includes/footer.php'; ?>
