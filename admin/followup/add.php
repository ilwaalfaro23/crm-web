<?php
include '../../includes/auth-check.php';
include '../../config/database.php';

$customer_id = $_GET['customer_id'];

if (isset($_POST['submit'])) {
  $note = $_POST['note'];

  mysqli_query($conn, 
    "INSERT INTO followups (customer_id, note) 
     VALUES ('$customer_id','$note')"
  );

  mysqli_query($conn, 
  "UPDATE customers SET status='Follow Up' 
   WHERE id='$customer_id'"
);

  header("Location: history.php?customer_id=$customer_id");
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="main-content">
  <h3>Add Follow Up</h3>

  <form method="POST">
    <div class="mb-3">
      <label>Follow Up Note</label>
      <textarea name="note" class="form-control" required></textarea>
    </div>

    <button name="submit" class="btn btn-primary">Save</button>
    <a href="history.php?customer_id=<?= $customer_id; ?>" 
       class="btn btn-secondary">
       Back
    </a>
  </form>
</div>

<?php include '../../includes/footer.php'; ?>
