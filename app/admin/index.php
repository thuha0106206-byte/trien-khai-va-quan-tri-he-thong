<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../db.php';

$projects = $pdo->query('SELECT * FROM projects ORDER BY id DESC')
                ->fetchAll(PDO::FETCH_ASSOC);

$skills = $pdo->query('SELECT * FROM skills ORDER BY id DESC')
              ->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
            color: #1e293b;
        }
        .container {
            max-width: 1000px;
            margin: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .card {
            background: white;
            padding: 22px;
            margin-top: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #0001;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        a {
            color: #2563eb;
            text-decoration: none;
        }
        .logout {
            background: #dc2626;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div>
            <h1>Trang quản trị Portfolio</h1>
            <p>Xin chào, <?= htmlspecialchars($_SESSION['admin_username']) ?>!</p>
        </div>
        <a class="logout" href="logout.php">Đăng xuất</a>
    </div>

    <div class="card">
        <h2>Danh sách dự án</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên dự án</th>
                <th>Công nghệ</th>
                <th>Liên kết</th>
            </tr>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= (int)$project['id'] ?></td>
                <td><?= htmlspecialchars($project['title']) ?></td>
                <td><?= htmlspecialchars($project['technologies'] ?? '') ?></td>
                <td><?= htmlspecialchars($project['project_link'] ?? '') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="card">
        <h2>Danh sách kỹ năng</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên kỹ năng</th>
                <th>Mức độ (%)</th>
            </tr>
            <?php foreach ($skills as $skill): ?>
            <tr>
                <td><?= (int)$skill['id'] ?></td>
                <td><?= htmlspecialchars($skill['skill_name']) ?></td>
                <td><?= (int)$skill['proficiency'] ?>%</td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>
