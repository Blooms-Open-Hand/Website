<?php
require_once __DIR__ . '/config.php';

// If already logged in, go straight to dashboard.
if (isset($_SESSION['admin_id'])) {
    redirect('index.php');
}

// Process login HERE. Do not include auth.php on this page,
// because auth.php is the protection/guard for private pages.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        flash('Please enter your email and password.', 'error');
        redirect('login.php');
    }

    $stmt = db()->prepare('SELECT id, name, email, password FROM admins WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = (int)$admin['id'];
        $_SESSION['admin_name'] = $admin['name'];
        $_SESSION['admin_email'] = $admin['email'];

        redirect('index.php');
    }

    flash('Invalid email or password.', 'error');
    redirect('login.php');
}

$f = flash();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Home Care Admin Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
<div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8">
    <div class="text-center mb-8">
        <div class="mx-auto h-14 w-14 rounded-2xl bg-emerald-700 text-white flex items-center justify-center text-2xl">♥</div>
        <h1 class="mt-4 text-2xl font-bold text-slate-800">BLOOMS OPEN HAND Admin</h1>
        <p class="text-sm text-slate-500 mt-1">Manage your website content</p>
    </div>

    <?php if ($f): ?>
        <div class="mb-4 rounded-xl p-3 text-sm <?= $f[1] === 'error' ? 'bg-red-50 text-red-700' : 'bg-emerald-50 text-emerald-700' ?>">
            <?= h($f[0]) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php" class="space-y-4">
        <input type="hidden" name="login" value="1">

        <div>
            <label class="text-sm font-medium text-slate-700">Email</label>
            <input name="email" type="email" value="admin@homecare.local" required
                   class="mt-1 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100">
        </div>

        <div>
            <label class="text-sm font-medium text-slate-700">Password</label>
            <input name="password" type="password" value="admin123" required
                   class="mt-1 w-full rounded-xl border px-4 py-3 outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100">
        </div>

        <button type="submit"
                class="w-full rounded-xl bg-emerald-700 py-3 font-semibold text-white hover:bg-emerald-800 transition">
            Sign In
        </button>
    </form>

    <div class="mt-5 rounded-xl bg-amber-50 p-3 text-xs text-amber-800">
        Default: <strong>admin@homecare.local</strong> / <strong>admin123</strong>
    </div>
</div>
</body>
</html>
