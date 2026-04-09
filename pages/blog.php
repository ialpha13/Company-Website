<?php
$rootPath = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . ($rootPath ? $rootPath : '') . '/';
$posts = [
    ['meta' => 'Strategy', 'title' => 'How brands turn digital presence into digital momentum', 'excerpt' => 'Why a clear strategy matters before design, content, and media execution begin.'],
    ['meta' => 'Web', 'title' => 'What makes a modern website feel premium and perform better', 'excerpt' => 'A closer look at structure, messaging, user flow, and experience quality.'],
    ['meta' => 'SEO', 'title' => 'Building visibility with smarter search-focused content', 'excerpt' => 'How search strategy and brand communication can work together instead of separately.'],
    ['meta' => 'Social Media', 'title' => 'Consistency beats noise in content-driven brand growth', 'excerpt' => 'Why planning, creative systems, and platform-aware execution matter more than volume alone.'],
    ['meta' => 'Creative', 'title' => 'The role of design systems in stronger brand communication', 'excerpt' => 'How consistent visuals increase recognition, trust, and content efficiency.'],
    ['meta' => 'Video', 'title' => 'Short-form video as a growth lever for modern brands', 'excerpt' => 'How motion content can sharpen messaging and improve campaign performance.'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uidigitax | Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/blog.css" />
</head>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<main class="page-shell">
    <section class="page-hero">
        <div class="page-hero__inner">
            <span class="page-pill">Blog</span>
            <h1>Insights on strategy, design, content, and digital growth.</h1>
            <p>The UIDigitax blog is where we share practical thinking around websites, SEO, social media, creative direction, and the systems that help brands scale with more intention.</p>
            <div class="page-actions">
                <a href="pages/services.php" class="page-btn page-btn--primary">View Services</a>
                <a href="pages/contact.php" class="page-btn page-btn--ghost">Talk to Us</a>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="page-section__heading">
            <span class="page-pill">Latest Topics</span>
            <h2>Articles that help brands make better digital decisions.</h2>
        </div>
        <div class="page-grid page-grid--two">
            <?php foreach ($posts as $post): ?>
                <article class="page-post" data-reveal-card>
                    <span class="page-post__meta"><?php echo htmlspecialchars($post['meta']); ?></span>
                    <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                    <p class="page-post__excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="page-cta">
        <div class="page-cta__inner">
            <h2>Need ideas turned into execution?</h2>
            <p>We help brands move from planning to polished delivery across web, search, social, and creative content.</p>
            <div class="page-actions">
                <a href="pages/contact.php" class="page-btn page-btn--primary">Start Here</a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/blog.js"></script>
</body>
</html>
