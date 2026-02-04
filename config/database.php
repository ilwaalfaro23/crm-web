<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "crm_db";

$conn = mysqli_connect("localhost", "root", "", "crm_db");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
