<?php
$rootPath = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . ($rootPath ? $rootPath : '') . '/';
$servicesPath = __DIR__ . '/../data/services.json';
$services = [];
if (is_file($servicesPath)) {
    $decoded = json_decode(file_get_contents($servicesPath), true);
    if (is_array($decoded)) {
        $services = $decoded;
    }
}

$galleryItems = [];
foreach ($services as $service) {
    foreach (($service['media'] ?? []) as $mediaIndex => $media) {
        $galleryItems[] = [
            'service_title' => $service['title'] ?? 'Service',
            'service_slug' => $service['slug'] ?? '',
            'type' => $media['type'] ?? 'screenshot',
            'title' => $media['title'] ?? ($service['title'] ?? 'Portfolio Media'),
            'caption' => $media['caption'] ?? ($service['description'] ?? ''),
            'asset' => $media['asset'] ?? 'assets/images/hero.png',
            'size' => ($mediaIndex % 3 === 0) ? 'large' : (($mediaIndex % 3 === 1) ? 'wide' : 'standard'),
        ];
    }
}
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

<main class="portfolio-page">
    <section class="portfolio-hero" id="portfolioGallery">
        <div class="portfolio-hero__inner">
            <div class="portfolio-hero__track portfolio-hero__track--left">
                <div class="portfolio-hero__lane">
                    <?php foreach (array_merge($galleryItems, $galleryItems) as $item): ?>
                        <article class="hero-media-tile hero-media-tile--<?php echo htmlspecialchars($item['size']); ?><?php echo ($item['type'] ?? '') === 'video' ? ' hero-media-tile--video' : ''; ?>">
                            <div class="hero-media-tile__visual" style="background-image:
                                linear-gradient(180deg, rgba(9, 15, 12, 0.08) 0%, rgba(9, 15, 12, 0.68) 100%),
                                url('<?php echo htmlspecialchars($item['asset']); ?>');">
                                <div class="hero-media-tile__meta">
                                    <span class="hero-media-tile__type"><?php echo htmlspecialchars(($item['type'] ?? 'media') === 'video' ? 'Video Preview' : 'Screenshot'); ?></span>
                                    <strong><?php echo htmlspecialchars($item['title']); ?></strong>
                                    <p><?php echo htmlspecialchars($item['service_title']); ?></p>
                                </div>
                                <?php if (($item['type'] ?? '') === 'video'): ?>
                                    <span class="hero-media-tile__play" aria-hidden="true"></span>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="portfolio-hero__track portfolio-hero__track--right">
                <div class="portfolio-hero__lane">
                    <?php foreach (array_merge(array_reverse($galleryItems), array_reverse($galleryItems)) as $item): ?>
                        <article class="hero-media-tile hero-media-tile--<?php echo htmlspecialchars($item['size']); ?><?php echo ($item['type'] ?? '') === 'video' ? ' hero-media-tile--video' : ''; ?>">
                            <div class="hero-media-tile__visual" style="background-image:
                                linear-gradient(180deg, rgba(9, 15, 12, 0.08) 0%, rgba(9, 15, 12, 0.68) 100%),
                                url('<?php echo htmlspecialchars($item['asset']); ?>');">
                                <div class="hero-media-tile__meta">
                                    <span class="hero-media-tile__type"><?php echo htmlspecialchars(($item['type'] ?? 'media') === 'video' ? 'Video Preview' : 'Screenshot'); ?></span>
                                    <strong><?php echo htmlspecialchars($item['title']); ?></strong>
                                    <p><?php echo htmlspecialchars($item['service_title']); ?></p>
                                </div>
                                <?php if (($item['type'] ?? '') === 'video'): ?>
                                    <span class="hero-media-tile__play" aria-hidden="true"></span>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-cards">
        <div class="portfolio-cards__intro">
            <span class="portfolio-pill">Service Portfolios</span>
            <h2>Choose a service and continue into its dedicated portfolio page.</h2>
            <p>Each card represents a focused service line. Hover to reveal the next step, whether you want to explore the portfolio details or start a conversation about that service.</p>
        </div>

        <div class="portfolio-card-grid">
            <?php foreach ($services as $index => $service): ?>
                <?php
                $portfolioUrl = 'portfolios/' . rawurlencode($service['slug'] ?? ('service-' . $index)) . '.php';
                $coverMedia = $service['media'][0] ?? null;
                ?>
                <article class="portfolio-card" data-portfolio-card>
                    <div class="portfolio-card__inner">
                        <div class="portfolio-card__face portfolio-card__face--front" style="background-image:
                            linear-gradient(180deg, rgba(8, 13, 11, 0.12) 0%, rgba(8, 13, 11, 0.78) 100%),
                            url('<?php echo htmlspecialchars($coverMedia['asset'] ?? 'assets/images/hero.png'); ?>');">
                            <span class="portfolio-card__index"><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                            <div class="portfolio-card__front-copy">
                                <span class="portfolio-pill portfolio-pill--muted">Portfolio</span>
                                <h3><?php echo htmlspecialchars($service['title'] ?? 'Service'); ?></h3>
                                <p><?php echo htmlspecialchars($service['description'] ?? ''); ?></p>
                            </div>
                        </div>

                        <div class="portfolio-card__face portfolio-card__face--back">
                            <span class="portfolio-pill">Ready To Explore</span>
                            <h3><?php echo htmlspecialchars($service['title'] ?? 'Service'); ?></h3>
                            <p>Review the complete portfolio presentation for this service or discuss how it can be tailored for your brand.</p>
                            <div class="portfolio-card__actions">
                                <a href="<?php echo htmlspecialchars($portfolioUrl); ?>" class="portfolio-btn portfolio-btn--primary">View Portfolio</a>
                                <a href="pages/contact.php" class="portfolio-btn portfolio-btn--ghost">Discuss Service</a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="portfolio-cta">
        <div class="portfolio-cta__inner">
            <span class="portfolio-pill">Next Step</span>
            <h2>Looking for a digital partner that can combine strategy, design, development, and growth support?</h2>
            <p>UIDigitax helps brands build a more complete digital presence, from polished interfaces and content systems to performance-focused marketing execution.</p>
            <div class="portfolio-hero__actions">
                <a href="pages/contact.php" class="portfolio-btn portfolio-btn--primary">Start a Conversation</a>
                <a href="pages/services.php" class="portfolio-btn portfolio-btn--ghost">View Services</a>
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
