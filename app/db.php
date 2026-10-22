<?php
$host = getenv('DB_HOST') ?: 'mysql';
$db   = getenv('DB_NAME') ?: 'portfolio_db';
$user = getenv('DB_USER') ?: 'portfolio_user';
$pass = getenv('DB_PASSWORD') ?: '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
} catch (\PDOException $e) {
    http_response_code(503);
    echo "503 - Không thể kết nối cơ sở dữ liệu.";
    exit;
}
