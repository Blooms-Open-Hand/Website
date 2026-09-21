<?php
// CHANGE THESE DATABASE SETTINGS FOR YOUR SERVER
define('DB_HOST', 'localhost');
define('DB_NAME', 'home_care_db');
define('DB_USER', 'root');
define('DB_PASS', 'root');

session_start();

function db(): PDO
{
    static $pdo = null;
    if ($pdo) return $pdo;

    try {
        $server = new PDO(
            'mysql:host=' . DB_HOST . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        $server->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

        installDatabase($pdo);
        return $pdo;
    } catch (PDOException $e) {
        die('<div style="font-family:Arial;padding:30px"><h2>Database Error</h2><p>' .
            htmlspecialchars($e->getMessage()) .
            '</p><p>Check config.php.</p></div>');
    }
}

function installDatabase(PDO $pdo): void
{
    $pdo->exec("CREATE TABLE IF NOT EXISTS banners (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        image_url VARCHAR(1000),
        button_text VARCHAR(100),
        button_link VARCHAR(1000),
        status ENUM('published','draft') DEFAULT 'published',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS blogs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(300),
        excerpt TEXT,
        content LONGTEXT,
        featured_image VARCHAR(1000),
        status ENUM('published','draft') DEFAULT 'draft',
        published_at DATETIME NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS gallery (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        description TEXT,
        image_url VARCHAR(1000) NOT NULL,
        category VARCHAR(100),
        status ENUM('published','draft') DEFAULT 'published',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS tours (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        tour_date DATE NOT NULL,
        tour_time TIME NULL,
        location VARCHAR(255),
        description TEXT,
        instructions TEXT,
        status ENUM('upcoming','completed','cancelled') DEFAULT 'upcoming',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS website_settings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        setting_key VARCHAR(100) NOT NULL UNIQUE,
        setting_value TEXT,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(190) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    if ((int)$pdo->query("SELECT COUNT(*) FROM admins")->fetchColumn() === 0) {
        $stmt = $pdo->prepare("INSERT INTO admins (name,email,password) VALUES (?,?,?)");
        $stmt->execute([
            'Administrator',
            'admin@homecare.local',
            password_hash('admin123', PASSWORD_DEFAULT)
        ]);
    }
}

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): never
{
    header('Location: ' . $url);
    exit;
}

function flash(?string $message = null, string $type = 'success')
{
    if ($message !== null) {
        $_SESSION['flash'] = [$message, $type];
        return;
    }
    $f = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $f;
}

db();
