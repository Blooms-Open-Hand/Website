<?php
require_once __DIR__ . '/config.php';

if (isset($_GET['logout'])) {
    session_destroy();
    redirect('login.php');
}

if (isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = db()->prepare("SELECT * FROM admins WHERE email=? LIMIT 1");
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];
        redirect('index.php');
    }

    flash('Invalid email or password.', 'error');
    redirect('login.php');
}

if (!isset($_SESSION['admin_id'])) {
    redirect('login.php');
}
?>
