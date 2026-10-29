<?php
session_start();
include 'Koneksi.php';
if ($_SERVER["REQUEST_METHOD"] !== "POST") { header("Location: login.php"); exit(); }
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$stmt = mysqli_prepare($koneksi, "SELECT id, username, password FROM tb_user WHERE username = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if ($user && password_verify($password, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['login'] = true; $_SESSION['user_id'] = $user['id']; $_SESSION['username'] = $user['username'];
    header("Location: Index.php"); exit();
}
header("Location: login.php?error=1"); exit();
?>