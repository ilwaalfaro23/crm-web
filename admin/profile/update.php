<?php
session_start();
include '../../config/database.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($password)) {
  $hashed = password_hash($password, PASSWORD_DEFAULT);
  $query = "UPDATE users SET 
            name='$name', email='$email', password='$hashed'
            WHERE id='$id'";
} else {
  $query = "UPDATE users SET 
            name='$name', email='$email'
            WHERE id='$id'";
}

mysqli_query($conn, $query);

/* Update session */
$_SESSION['user']['name'] = $name;
$_SESSION['user']['email'] = $email;

header("Location: index.php");
