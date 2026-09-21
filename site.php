<?php
/**
 * Front-end database integration for the existing Anna Home Care design.
 * Uses the same database/configuration as the admin panel.
 */
$configCandidates = [
    __DIR__ . '/admin/config.php',
    __DIR__ . '/../admin/config.php',
];
$configLoaded = false;
foreach ($configCandidates as $candidate) {
    if (is_file($candidate)) {
        require_once $candidate;
        $configLoaded = true;
        break;
    }
}
if (!$configLoaded) {
    die('Admin database configuration was not found. Place this frontend beside the admin folder.');
}

$pdo = db();

function front_h($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
function front_setting(string $key, string $default = ''): string {
    global $pdo;
    static $cache = null;
    if ($cache === null) {
        $cache = [];
        try {
            foreach ($pdo->query("SELECT setting_key, setting_value FROM website_settings") as $row) {
                $cache[$row['setting_key']] = $row['setting_value'];
            }
        } catch (Throwable $e) {}
    }
    return trim((string)($cache[$key] ?? $default));
}
function front_phone_href(string $phone): string {
    return preg_replace('/[^0-9+]/', '', $phone);
}
function front_image(string $path, string $fallback = ''): string {
    $path = trim($path);
    if ($path === '') return $fallback;
    // Admin-uploaded relative paths are stored as uploads/images/...
    if (preg_match('~^https?://~i', $path) || str_starts_with($path, '/')) return $path;
    if (str_starts_with($path, 'admin/')) return $path;
    if (str_starts_with($path, 'uploads/')) return 'admin/' . $path;
    return $path;
}
function front_blog_category(string $title): string {
    $t = strtolower($title);
    if (preg_match('/medicaid|pay|cost|price|fund|financial/', $t)) return 'costs';
    if (preg_match('/alzheimer|dementia|memory|parkinson/', $t)) return 'memory';
    if (preg_match('/tour|checklist|choose|moving|signs|parent/', $t)) return 'family';
    if (preg_match('/health|caregiver|burnout|isolation|loneliness/', $t)) return 'health';
    return 'all';
}
function front_date(string $date): string {
    $ts = strtotime($date);
    return $ts ? date('F j, Y', $ts) : '';
}
function front_time(?string $time): string {
    if (!$time) return '';
    $ts = strtotime($time);
    return $ts ? date('g:i A', $ts) : '';
}

$organization = front_setting('organization_name', 'BLOOMS OPEN HAND LLC');
$phone = front_setting('phone', '+1 (240) 643-1344');
$email = front_setting('email', '');
$address = front_setting('address', '7229 69th Ave NE, Marysville, WA 98270');
$mapsUrl = front_setting('google_maps_url', '');
$facebook = front_setting('facebook', '');
$instagram = front_setting('instagram', '');
$linkedin = front_setting('linkedin', '');
$workingHours = front_setting('working_hours', '');

$publishedBanners = $pdo->query("SELECT * FROM banners WHERE status='published' ORDER BY id DESC")->fetchAll();
$publishedGallery = $pdo->query("SELECT * FROM gallery WHERE status='published' ORDER BY id DESC")->fetchAll();
$publishedBlogs = $pdo->query("SELECT * FROM blogs WHERE status='published' ORDER BY COALESCE(published_at, created_at) DESC, id DESC")->fetchAll();
$upcomingTours = $pdo->query("SELECT * FROM tours WHERE status='upcoming' AND tour_date >= CURDATE() ORDER BY tour_date ASC, tour_time ASC")->fetchAll();

function front_base_href(string $page): string {
    return $page;
}
?>
