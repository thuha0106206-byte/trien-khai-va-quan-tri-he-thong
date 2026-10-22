<?php
session_start();
require_once __DIR__ . '/../db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare(
        'SELECT id, username, password FROM admins WHERE username = ? LIMIT 1'
    );
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Hỗ trợ mật khẩu MD5 cũ trong init.sql và mật khẩu hash mới.
    $valid = $admin && (
        hash_equals($admin['password'], md5($password)) ||
        password_verify($password, $admin['password'])
    );

    if ($valid) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];

        // Nâng cấp mật khẩu MD5 sang password_hash sau lần đăng nhập.
        if (hash_equals($admin['password'], md5($password))) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $update = $pdo->prepare(
                'UPDATE admins SET password = ? WHERE id = ?'
            );
            $update->execute([$newHash, $admin['id']]);
        }

        header('Location: index.php');
        exit;
    }

    $error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            display: grid;
            place-items: center;
            min-height: 100vh;
            margin: 0;
        }
        form {
            background: white;
            padding: 28px;
            border-radius: 12px;
            width: min(340px, calc(100% - 56px));
            box-shadow: 0 4px 20px #0001;
        }
        h1 { font-size: 24px; }
        label { display: block; margin-top: 14px; }
        input {
            box-sizing: border-box;
            width: 100%;
            padding: 11px;
            margin-top: 6px;
        }
        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
        }
        .error { color: #dc2626; }
    </style>
</head>
<body>
    <form method="post">
        <h1>Đăng nhập Admin</h1>

        <?php if ($error !== ''): ?>
            <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <label for="username">Tên đăng nhập</label>
        <input id="username" name="username" required autocomplete="username">

        <label for="password">Mật khẩu</label>
        <input id="password" name="password" type="password"
               required autocomplete="current-password">

        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>

