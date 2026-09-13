<?php
// Use the SAME database settings as the admin dashboard.
define('DB_HOST', 'localhost');
define('DB_NAME', 'blootqwr_db');
define('DB_USER', 'blootqwr_admin');
define('DB_PASS', '@op10928725');

function db(): PDO {
    static $pdo = null;
    if ($pdo) return $pdo;
    try {
        $pdo = new PDO(
            'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        die('Database connection failed. Check config.php.');
    }
}
function h($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
db();
?>
