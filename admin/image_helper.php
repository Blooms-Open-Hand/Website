<?php
function uploadImage(string $field, string $folder = 'images'): ?string {
    if (!isset($_FILES[$field]) || $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Image upload failed. Please try again.');
    }

    if ($_FILES[$field]['size'] > 8 * 1024 * 1024) {
        throw new RuntimeException('Image is too large. Maximum size is 8 MB.');
    }

    $tmp = $_FILES[$field]['tmp_name'];
    $info = @getimagesize($tmp);
    if (!$info) {
        throw new RuntimeException('The selected file is not a valid image.');
    }

    $allowed = [
        IMAGETYPE_JPEG => 'jpg',
        IMAGETYPE_PNG  => 'png',
        IMAGETYPE_WEBP => 'webp',
        IMAGETYPE_GIF  => 'gif'
    ];

    $type = $info[2] ?? 0;
    if (!isset($allowed[$type])) {
        throw new RuntimeException('Only JPG, PNG, WEBP and GIF images are allowed.');
    }

    $relativeDir = 'uploads/' . trim($folder, '/');
    $absoluteDir = __DIR__ . '/' . $relativeDir;
    if (!is_dir($absoluteDir) && !mkdir($absoluteDir, 0755, true)) {
        throw new RuntimeException('Could not create the image upload directory.');
    }

    $filename = bin2hex(random_bytes(12)) . '.' . $allowed[$type];
    $destination = $absoluteDir . '/' . $filename;

    if (!move_uploaded_file($tmp, $destination)) {
        throw new RuntimeException('Could not save the uploaded image. Check folder permissions.');
    }

    return $relativeDir . '/' . $filename;
}

function deleteLocalImage(?string $path): void {
    if (!$path) return;
    $normalized = str_replace('\\', '/', $path);
    if (str_starts_with($normalized, 'uploads/')) {
        $full = __DIR__ . '/' . ltrim($normalized, '/');
        if (is_file($full)) @unlink($full);
    }
}
?>
