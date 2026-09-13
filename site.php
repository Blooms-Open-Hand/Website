<?php
require_once __DIR__.'/config.php';
$pdo = db();

function setting(string $key, string $fallback=''): string {
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
    return $cache[$key] ?? $fallback;
}

function assetImage(?string $url, string $fallback='https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=1200&q=85'): string {
    $url = trim((string)$url);
    if ($url === '') return $fallback;
    if (preg_match('/^https?:\/\//i', $url)) return $url;
    return ltrim($url, '/');
}

function excerpt(string $text, int $length=145): string {
    $text = trim(strip_tags($text));
    return mb_strlen($text) > $length ? mb_substr($text,0,$length).'…' : $text;
}

$organization = setting('organization_name', 'Home Care');
$phone = setting('phone', '+1 (240) 643-1344');
$email = setting('email', 'blomsopenhand24@gmail.com');
$address = setting('address', '7229 69th Ave NE, Marysville, WA 98270');
$maps = setting('google_maps_url', '');
$facebook = setting('facebook', '#');
$instagram = setting('instagram', '#');
$linkedin = setting('linkedin', '#');
$hours = setting('working_hours', 'Monday - Friday: 8:00 AM - 5:00 PM');

function navActive(string $page): string {
    return basename($_SERVER['PHP_SELF']) === $page ? 'text-emerald-700' : 'text-slate-600 hover:text-emerald-700';
}
?>
