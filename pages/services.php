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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uidigitax | Services</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/services.css" />
</head>
<body>

<?php include __DIR__ . '/../includes/navbar.php'; ?>

<main class="services-page">
    <section class="services-hero">
        <div class="services-hero__inner">
            <div class="services-hero__content">
                <span class="services-hero__eyebrow">uidigitax services</span>
                <h1>Services designed to shape stronger digital presence, sharper execution, and measurable brand growth.</h1>
                <p>Explore our core service areas below. Each one opens into its own portfolio page with supporting screenshots, showcase videos, process notes, and project-specific detail.</p>
            </div>

            <div class="services-hero__visual" aria-hidden="true">
                <div class="services-orbit services-orbit--outer"></div>
                <div class="services-orbit services-orbit--middle"></div>
                <div class="services-orbit services-orbit--inner"></div>

                <div class="services-hero__center">
                    <strong><?php echo count($services); ?>+</strong>
                    <span>Core Services</span>
                </div>

                <?php foreach ($services as $index => $service): ?>
                    <?php
                    $orbitClasses = ['services-pill--outer', 'services-pill--middle', 'services-pill--inner'];
                    $orbitClass = $orbitClasses[$index % count($orbitClasses)];
                    ?>
                    <div class="services-pill-float <?php echo $orbitClass; ?>" style="--orbit-order: <?php echo $index; ?>;">
                        <span><?php echo htmlspecialchars($service['title'] ?? 'Service'); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="services-stack" aria-label="Service list">
        <div class="services-stack__shell">
            <?php foreach ($services as $index => $service): ?>
                <?php
                $serviceUrl = 'pages/service-portfolio.php?service=' . urlencode($service['slug'] ?? '');
                ?>
                <article class="service-row" data-service-row>
                    <button class="service-row__toggle" type="button" aria-expanded="false">
                        <span class="service-row__index"><?php echo str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                        <span class="service-row__main">
                            <span class="service-row__title"><?php echo htmlspecialchars($service['title'] ?? 'Service'); ?></span>
                            <?php if (!empty($service['tags']) && is_array($service['tags'])): ?>
                                <span class="service-row__tags">
                                    <?php foreach ($service['tags'] as $tagIndex => $tag): ?>
                                        <span><?php echo htmlspecialchars($tag); ?></span><?php if ($tagIndex < count($service['tags']) - 1): ?><i aria-hidden="true"></i><?php endif; ?>
                                    <?php endforeach; ?>
                                </span>
                            <?php endif; ?>
                        </span>
                    </button>

                    <div class="service-row__details">
                        <p><?php echo htmlspecialchars($service['description'] ?? ''); ?></p>
                        <div class="service-row__actions">
                            <a href="<?php echo htmlspecialchars($serviceUrl); ?>" class="service-row__btn">Explore Portfolio</a>
                            <a href="pages/contact.php" class="service-row__link">Discuss Services</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/services.js"></script>
</body>
</html>
