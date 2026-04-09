<?php
$rootPath = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . ($rootPath ? $rootPath : '') . '/';
$servicesPath = dirname(__DIR__) . '/data/services.json';
$services = [];
$service = null;
$portfolioSlug = $portfolioSlug ?? '';
$portfolioCss = $portfolioCss ?? '';
$portfolioJs = $portfolioJs ?? '';

if (is_file($servicesPath)) {
    $decoded = json_decode(file_get_contents($servicesPath), true);
    if (is_array($decoded)) {
        $services = $decoded;
    }
}

foreach ($services as $item) {
    if (($item['slug'] ?? '') === $portfolioSlug) {
        $service = $item;
        break;
    }
}

if ($service === null) {
    http_response_code(404);
    $service = [
        'title' => 'Service Portfolio',
        'detail_intro' => 'The requested service portfolio could not be found.',
        'tags' => [],
        'overview' => [],
        'deliverables' => [],
        'portfolio_highlights' => [],
        'media' => [],
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uidigitax | <?php echo htmlspecialchars($service['title'] ?? 'Service Portfolio'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/portfolios/base.css" />
    <?php if ($portfolioCss !== ''): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($portfolioCss); ?>" />
    <?php endif; ?>
</head>
<body>

<?php include dirname(__DIR__) . '/includes/navbar.php'; ?>

<main class="service-portfolio-page">
    <section class="service-portfolio-hero">
        <div class="service-portfolio-hero__inner">
            <span class="service-portfolio-pill">Service Portfolio</span>
            <h1><?php echo htmlspecialchars($service['title'] ?? 'Service'); ?></h1>
            <?php if (!empty($service['tags']) && is_array($service['tags'])): ?>
                <div class="service-portfolio-hero__tags">
                    <?php foreach ($service['tags'] as $tag): ?>
                        <span><?php echo htmlspecialchars($tag); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <p><?php echo htmlspecialchars($service['detail_intro'] ?? ($service['description'] ?? '')); ?></p>
            <div class="service-portfolio-hero__actions">
                <a href="pages/contact.php" class="service-portfolio-btn service-portfolio-btn--primary">Discuss Project</a>
                <a href="pages/services.php" class="service-portfolio-btn service-portfolio-btn--ghost">Back to Services</a>
            </div>
        </div>
    </section>

    <section class="service-portfolio-section">
        <div class="service-portfolio-copy">
            <div class="service-portfolio-heading">
                <span class="service-portfolio-pill">Overview</span>
                <h2>What this service includes and how it creates value.</h2>
            </div>
            <div class="service-portfolio-copy__grid">
                <div class="service-portfolio-richtext">
                    <?php foreach (($service['overview'] ?? []) as $paragraph): ?>
                        <p><?php echo htmlspecialchars($paragraph); ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="service-portfolio-checklist">
                    <div class="service-portfolio-panel">
                        <h3>Deliverables</h3>
                        <ul>
                            <?php foreach (($service['deliverables'] ?? []) as $deliverable): ?>
                                <li><?php echo htmlspecialchars($deliverable); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="service-portfolio-panel">
                        <h3>Portfolio Highlights</h3>
                        <ul>
                            <?php foreach (($service['portfolio_highlights'] ?? []) as $highlight): ?>
                                <li><?php echo htmlspecialchars($highlight); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-portfolio-section">
        <div class="service-portfolio-heading">
            <span class="service-portfolio-pill">Showcase</span>
            <h2>Screenshots, video previews, and presentation assets for this service.</h2>
        </div>
        <div class="service-portfolio-media">
            <?php foreach (($service['media'] ?? []) as $media): ?>
                <article class="service-media-card<?php echo ($media['type'] ?? '') === 'video' ? ' service-media-card--video' : ''; ?>" data-service-media-card>
                    <div class="service-media-card__visual" style="background-image: linear-gradient(180deg, rgba(19, 23, 18, 0.18) 0%, rgba(19, 23, 18, 0.72) 100%), url('<?php echo htmlspecialchars($media['asset'] ?? 'assets/images/hero.png'); ?>');">
                        <span class="service-media-card__type"><?php echo htmlspecialchars(strtoupper($media['type'] ?? 'media')); ?></span>
                        <?php if (($media['type'] ?? '') === 'video'): ?>
                            <span class="service-media-card__play" aria-hidden="true"></span>
                        <?php endif; ?>
                    </div>
                    <div class="service-media-card__content">
                        <h3><?php echo htmlspecialchars($media['title'] ?? 'Media item'); ?></h3>
                        <p><?php echo htmlspecialchars($media['caption'] ?? ''); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="service-portfolio-section">
        <div class="service-portfolio-cta">
            <h2>Need this service tailored to your brand?</h2>
            <p>UIDigitax can shape a version of this service around your goals, audience, and growth stage with the right mix of design, strategy, and execution.</p>
            <div class="service-portfolio-hero__actions">
                <a href="pages/contact.php" class="service-portfolio-btn service-portfolio-btn--primary">Start a Conversation</a>
            </div>
        </div>
    </section>
</main>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/portfolios/base.js"></script>
<?php if ($portfolioJs !== ''): ?>
    <script src="<?php echo htmlspecialchars($portfolioJs); ?>"></script>
<?php endif; ?>
</body>
</html>
