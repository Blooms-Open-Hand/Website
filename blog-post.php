<?php require_once __DIR__ . "/site.php";
$slug = trim($_GET["slug"] ?? "");
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE status='published' AND slug=? LIMIT 1");
$stmt->execute([$slug]);
$post = $stmt->fetch();
if (!$post) { http_response_code(404); }
$postImage = $post ? front_image($post["featured_image"] ?? "", "blog-caregiver-senior.png") : "blog-caregiver-senior.png";
$pageTitle = $post["title"] ?? "Article Not Found";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="BLOOMS OPEN HAND LLC" />
<link rel="manifest" href="/site.webmanifest" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?=front_h($pageTitle)?> | <?=front_h($organization)?></title>
<meta name="description" content="<?=front_h($post["excerpt"] ?? "")?>" />
<link rel="stylesheet" href="styles.css" />
<link rel="stylesheet" href="blog.css" />
</head>
<body>
<div class="announce-bar" id="announceBar" role="alert"><div class="announce-inner"><span class="announce-dot" aria-hidden="true"></span><strong>Resources for Families</strong><span class="announce-divider">·</span><span><?=front_h($organization)?></span><a href="tel:<?=front_phone_href($phone)?>" class="announce-cta">Call <?=front_h($phone)?> →</a></div><button class="announce-close" id="announceClose" aria-label="Close">✕</button></div>
<div class="identity-bar"><div class="container"><div class="identity-bar-inner"><span class="identity-name"><?=front_h($organization)?></span><span class="identity-divider" aria-hidden="true">·</span><span class="identity-sub">Licensed Adult Family Home</span><span class="identity-divider" aria-hidden="true">·</span><span class="identity-loc">📍 <?=front_h($address)?></span><span class="identity-divider identity-divider-hide" aria-hidden="true">·</span><a href="tel:<?=front_phone_href($phone)?>" class="identity-phone">📞 <?=front_h($phone)?></a></div></div></div>
<nav class="navbar" id="navbar" role="navigation" aria-label="Main navigation"><div class="navbar-inner">
<a href="index.php" class="navbar-logo" aria-label="Home"><img src="Logo.png" alt="<?=front_h($organization)?>" style="height:70px;width:auto;display:block;" /></a>
<ul class="navbar-links" role="list"><li><a href="index.php">Home</a></li><li><a href="about.php">About Us</a></li><li><a href="services.php">Services</a></li><li><a href="gallery.php">Gallery</a></li><li><a href="blog.php" class="active">Blog</a></li><li><a href="contact.php">Contact</a></li></ul>
<div class="navbar-cta"><a href="tel:<?=front_phone_href($phone)?>" class="navbar-phone">📞 <?=front_h($phone)?></a><a href="contact.php" class="btn btn-primary">Schedule a Tour</a></div>
<button class="hamburger" id="hamburger" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobileMenu"><span></span><span></span><span></span></button>
</div></nav>
<div class="mobile-menu" id="mobileMenu" role="menu"><a href="index.php">Home</a><a href="about.php">About Us</a><a href="services.php">Services</a><a href="gallery.php">Gallery</a><a href="blog.php">Blog</a><a href="contact.php">Contact</a><div class="mobile-menu-cta"><a href="tel:<?=front_phone_href($phone)?>" class="btn btn-outline">📞 <?=front_h($phone)?></a><a href="contact.php" class="btn btn-primary">Schedule a Tour</a></div></div>
<main class="page-top">
<section class="blog-page-hero"><div class="container"><span class="section-label" style="color:rgba(255,255,255,0.6);">Resources for Families</span><h1><?=front_h($post["title"] ?? "Article Not Found")?></h1><p><?=front_h($post["excerpt"] ?? "The requested article could not be found.")?></p></div></section>
<section class="section" style="background:var(--white);padding-top:50px;"><div class="container"><article class="blog-article fade-in">
<?php if ($post): ?>
<div class="blog-card-meta"><span class="blog-card-tag"><?=front_h(ucwords(str_replace(['-','_'],' ',front_blog_category($post['title']))))?></span><span class="blog-card-date"><?=front_h(front_date($post['published_at'] ?: $post['created_at']))?></span></div>
<?php if ($post['featured_image']): ?><img src="<?=front_h($postImage)?>" alt="<?=front_h($post['title'])?>" style="width:100%;max-height:560px;object-fit:cover;border-radius:18px;margin:1.5rem 0;" /><?php endif; ?>
<h2><?=front_h($post['title'])?></h2>
<?php if ($post['excerpt']): ?><p class="section-subtitle"><?=front_h($post['excerpt'])?></p><?php endif; ?>
<div class="blog-content" style="line-height:1.85;white-space:normal;"><?=nl2br(front_h($post['content']))?></div>
<?php else: ?><p>Sorry, this article is no longer available.</p><a href="blog.php" class="btn btn-primary">Back to Blog</a><?php endif; ?>
</article></div></section>
</main>
<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body></html>