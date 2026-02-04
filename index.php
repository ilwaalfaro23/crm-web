<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: /crm-web/admin/dashboard.php");
} else {
    header("Location: /crm-web/auth/login.php");
}
exit;
