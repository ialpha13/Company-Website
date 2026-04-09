<?php
$rootPath = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . ($rootPath ? $rootPath : '') . '/';
$projects = [
    [
        'category' => 'Website Development',
        'title' => 'Brand-first corporate website redesign',
        'description' => 'A cleaner, conversion-aware website structure built to elevate trust, sharpen messaging, and improve lead quality.',
        'points' => ['Custom page architecture', 'Responsive UI system', 'Clear conversion flow'],
    ],
    [
        'category' => 'SEO + Content',
        'title' => 'Search visibility growth campaign',
        'description' => 'An SEO-led content and technical improvement project focused on discoverability, authority, and sustainable organic traffic growth.',
        'points' => ['Keyword strategy', 'On-page optimization', 'Performance tracking'],
    ],
    [
        'category' => 'Social Media',
        'title' => 'Cross-platform content management system',
        'description' => 'A brand content framework designed to improve consistency, increase engagement, and simplify publishing cadence.',
        'points' => ['Content planning', 'Creative rollout', 'Monthly reporting'],
    ],
    [
        'category' => 'Creative Design',
        'title' => 'Identity refresh for a modern digital brand',
        'description' => 'A refined visual system built to make the brand more memorable across web, social, and campaign touchpoints.',
        'points' => ['Brand direction', 'Visual asset kit', 'Campaign-ready creative'],
    ],
    [
        'category' => 'Video Editing',
        'title' => 'Short-form launch content package',
        'description' => 'A motion-first set of launch assets tailored for social distribution, paid campaigns, and product storytelling.',
        'points' => ['Reels and shorts', 'Promo cutdowns', 'Platform formatting'],
    ],
    [
        'category' => 'Digital Marketing',
        'title' => 'Lead generation campaign optimization',
        'description' => 'A digital campaign system balancing paid traffic, messaging refinement, and better conversion tracking.',
        'points' => ['Audience targeting', 'Ad creative testing', 'Conversion reporting'],
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uidigitax | Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/portfolio.css" />
</head>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<main class="page-shell">
    <section class="page-hero">
        <div class="page-hero__inner">
            <span class="page-pill">Portfolio</span>
            <h1>Selected digital work built to improve how brands look, move, and grow.</h1>
            <p>Our portfolio reflects the kind of digital thinking UIDigitax brings to every project: stronger positioning, cleaner execution, and work designed to perform in real business contexts.</p>
            <div class="page-actions">
                <a href="mailto:contact@uidigitax.com" class="page-btn page-btn--primary">Discuss Your Project</a>
                <a href="pages/services.php" class="page-btn page-btn--ghost">Explore Services</a>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="page-section__heading">
            <span class="page-pill">Featured Work</span>
            <h2>Projects shaped around clarity, growth, and creative precision.</h2>
        </div>
        <div class="page-grid page-grid--three">
            <?php foreach ($projects as $project): ?>
                <article class="page-card">
                    <span class="page-card__kicker"><?php echo htmlspecialchars($project['category']); ?></span>
                    <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                    <p><?php echo htmlspecialchars($project['description']); ?></p>
                    <ul class="page-list">
                        <?php foreach ($project['points'] as $point): ?>
                            <li><?php echo htmlspecialchars($point); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="page-cta">
        <div class="page-cta__inner">
            <h2>Want work like this for your brand?</h2>
            <p>We combine design, technology, and marketing execution into digital outcomes that feel premium and perform with purpose.</p>
            <div class="page-actions">
                <a href="pages/contact.php" class="page-btn page-btn--primary">Start a Conversation</a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/portfolio.js"></script>
</body>
</html>
