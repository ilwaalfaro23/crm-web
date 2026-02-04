<?php
session_start();
include '../config/database.php';

if (!isset($_POST['email'], $_POST['password'])) {
    die("POST tidak terkirim");
}

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['login'] = true;
    $_SESSION['user']  = $user;

    header("Location: /crm-web/admin/dashboard.php");
    exit;

} else {
    header("Location: /crm-web/auth/login.php?error=1");
    exit;
}
