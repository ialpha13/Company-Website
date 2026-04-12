<?php
$rootPath = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . ($rootPath ? $rootPath : '') . '/';

$projects = [
    [
        'name' => 'Avenor Studio',
        'type' => 'Creative Agency Website',
        'url' => 'avenor.studio',
        'image' => 'assets/images/hero.png',
        'mobile' => 'assets/images/hero2.png',
        'summary' => 'A cinematic agency site with a strong first screen, polished sections, and clear lead paths.',
        'tags' => ['Brand Site', 'Responsive', 'Lead Flow'],
        'video' => 'Homepage walkthrough',
    ],
    [
        'name' => 'Growthline',
        'type' => 'SaaS Landing Page',
        'url' => 'growthline.app',
        'image' => 'assets/images/hero2.png',
        'mobile' => 'assets/images/hero3.jpeg',
        'summary' => 'A conversion-focused landing page designed around product clarity, proof, and sign-up intent.',
        'tags' => ['SaaS', 'Landing Page', 'Conversion'],
        'video' => 'Product scroll preview',
    ],
    [
        'name' => 'Northvale',
        'type' => 'Corporate Website',
        'url' => 'northvale.co',
        'image' => 'assets/images/hero3.jpeg',
        'mobile' => 'assets/images/hero.png',
        'summary' => 'A refined business website with structured messaging, service clarity, and trust-first presentation.',
        'tags' => ['Corporate', 'CMS Ready', 'SEO Base'],
        'video' => 'Service journey preview',
    ],
    [
        'name' => 'Luma Commerce',
        'type' => 'Ecommerce Experience',
        'url' => 'lumacommerce.store',
        'image' => 'assets/images/blogs/DigitalBrandMoment.png',
        'mobile' => 'assets/images/hero2.png',
        'summary' => 'A product-led storefront concept with visual merchandising, mobile browsing, and checkout focus.',
        'tags' => ['Ecommerce', 'Product UI', 'Mobile'],
        'video' => 'Shop flow walkthrough',
    ],
    [
        'name' => 'SignalPoint',
        'type' => 'Marketing Website',
        'url' => 'signalpoint.digital',
        'image' => 'assets/images/logo2.png',
        'mobile' => 'assets/images/hero3.jpeg',
        'summary' => 'A campaign-ready marketing site built to explain offers quickly and guide users toward action.',
        'tags' => ['Marketing', 'Campaigns', 'Fast UI'],
        'video' => 'Campaign page preview',
    ],
];

$activeProject = $projects[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uidigitax | Web Development Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/portfolios/web-development.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>
<body>
<?php include dirname(__DIR__) . '/includes/navbar.php'; ?>

<main class="wd-page">
    <section class="wd-hero" data-wd-reveal>
        <div class="wd-hero__copy">
            <span class="wd-pill">Web Development Portfolio</span>
            <h1>Websites built to look sharp, load fast, and convert.</h1>
            <p>Explore selected website concepts, responsive previews, and walkthrough-style showcases crafted for brands that need a stronger digital presence.</p>
            <div class="wd-actions">
                <a href="pages/contact.php" class="wd-btn wd-btn--primary">Start a Website Project</a>
                <a href="#websiteBrowser" class="wd-btn wd-btn--ghost">Explore Websites</a>
            </div>
        </div>

        <div class="wd-hero__visual" aria-hidden="true">
            <div class="wd-browser wd-browser--hero">
                <div class="wd-browser__bar">
                    <span></span><span></span><span></span>
                    <strong><?php echo htmlspecialchars($activeProject['url']); ?></strong>
                </div>
                <div class="wd-browser__screen" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.42)), url('<?php echo htmlspecialchars($activeProject['image']); ?>');"></div>
            </div>
            <div class="wd-phone wd-phone--hero">
                <div style="background-image: linear-gradient(180deg, rgba(8,10,8,0.05), rgba(8,10,8,0.5)), url('<?php echo htmlspecialchars($activeProject['mobile']); ?>');"></div>
            </div>
        </div>
    </section>

    <section class="wd-featured" data-wd-reveal>
        <div class="wd-section-heading">
            <span class="wd-pill">Featured Build</span>
            <h2><?php echo htmlspecialchars($activeProject['name']); ?></h2>
            <p><?php echo htmlspecialchars($activeProject['summary']); ?></p>
        </div>
        <div class="wd-featured__stage">
            <div class="wd-browser">
                <div class="wd-browser__bar">
                    <span></span><span></span><span></span>
                    <strong><?php echo htmlspecialchars($activeProject['url']); ?></strong>
                </div>
                <div class="wd-browser__screen" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.01), rgba(8,10,8,0.48)), url('<?php echo htmlspecialchars($activeProject['image']); ?>');">
                    <button class="wd-play" type="button" aria-label="Play <?php echo htmlspecialchars($activeProject['video']); ?>"></button>
                </div>
            </div>
            <div class="wd-phone">
                <div style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.5)), url('<?php echo htmlspecialchars($activeProject['mobile']); ?>');"></div>
            </div>
        </div>
    </section>

    <section class="wd-browser-section" id="websiteBrowser" data-wd-reveal>
        <div class="wd-section-heading">
            <span class="wd-pill">Project Browser</span>
            <h2>Five website showcases in one interactive preview.</h2>
        </div>

        <div class="wd-browser-layout">
            <div class="wd-project-list" role="tablist" aria-label="Website projects">
                <?php foreach ($projects as $index => $project): ?>
                    <button class="wd-project-tab<?php echo $index === 0 ? ' is-active' : ''; ?>" type="button" role="tab" aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>" data-wd-project='<?php echo htmlspecialchars(json_encode($project), ENT_QUOTES); ?>'>
                        <span><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                        <strong><?php echo htmlspecialchars($project['name']); ?></strong>
                        <em><?php echo htmlspecialchars($project['type']); ?></em>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="wd-live-preview">
                <div class="wd-browser">
                    <div class="wd-browser__bar">
                        <span></span><span></span><span></span>
                        <strong id="wdPreviewUrl"><?php echo htmlspecialchars($activeProject['url']); ?></strong>
                    </div>
                    <div class="wd-browser__screen" id="wdPreviewImage" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.01), rgba(8,10,8,0.48)), url('<?php echo htmlspecialchars($activeProject['image']); ?>');">
                        <button class="wd-play" type="button" id="wdPreviewPlay" aria-label="Play <?php echo htmlspecialchars($activeProject['video']); ?>"></button>
                    </div>
                </div>
                <div class="wd-preview-copy">
                    <span id="wdPreviewType"><?php echo htmlspecialchars($activeProject['type']); ?></span>
                    <h3 id="wdPreviewName"><?php echo htmlspecialchars($activeProject['name']); ?></h3>
                    <p id="wdPreviewSummary"><?php echo htmlspecialchars($activeProject['summary']); ?></p>
                    <div class="wd-tag-row" id="wdPreviewTags">
                        <?php foreach ($activeProject['tags'] as $tag): ?>
                            <span><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="wd-phone wd-phone--floating">
                    <div id="wdPreviewMobile" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.5)), url('<?php echo htmlspecialchars($activeProject['mobile']); ?>');"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="wd-video-grid-section" data-wd-reveal>
        <div class="wd-section-heading">
            <span class="wd-pill">Walkthroughs</span>
            <h2>Video-style previews for website flow, mobile behavior, and page rhythm.</h2>
        </div>
        <div class="wd-video-grid">
            <?php foreach (array_slice($projects, 0, 3) as $project): ?>
                <article class="wd-video-card" data-wd-reveal>
                    <div class="wd-video-card__visual" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.68)), url('<?php echo htmlspecialchars($project['image']); ?>');">
                        <button class="wd-play" type="button" aria-label="Play <?php echo htmlspecialchars($project['video']); ?>"></button>
                    </div>
                    <div>
                        <span><?php echo htmlspecialchars($project['type']); ?></span>
                        <h3><?php echo htmlspecialchars($project['video']); ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="wd-device-wall" data-wd-reveal>
        <div class="wd-section-heading">
            <span class="wd-pill">Responsive Showcase</span>
            <h2>Desktop and mobile presentations designed to feel consistent everywhere.</h2>
        </div>
        <div class="wd-device-wall__grid">
            <?php foreach ($projects as $project): ?>
                <article class="wd-device-card" data-wd-reveal>
                    <div class="wd-device-card__desktop" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.48)), url('<?php echo htmlspecialchars($project['image']); ?>');"></div>
                    <div class="wd-device-card__phone" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.5)), url('<?php echo htmlspecialchars($project['mobile']); ?>');"></div>
                    <h3><?php echo htmlspecialchars($project['name']); ?></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="wd-deliverables" data-wd-reveal>
        <div class="wd-section-heading">
            <span class="wd-pill">What We Deliver</span>
            <h2>Everything needed to make a website look premium and work clearly.</h2>
        </div>
        <div class="wd-deliverables__grid">
            <span>UI/UX design</span>
            <span>Responsive development</span>
            <span>Landing pages</span>
            <span>Content structure</span>
            <span>Speed optimization</span>
            <span>Contact forms</span>
            <span>SEO-ready setup</span>
            <span>Launch support</span>
        </div>
    </section>

    <section class="wd-cta" data-wd-reveal>
        <div class="wd-cta__inner">
            <span class="wd-pill">Build With UIDigitax</span>
            <h2>Need a website that feels sharp, clear, and ready for growth?</h2>
            <p>We can shape the structure, visuals, and responsive experience around your brand goals.</p>
            <div class="wd-actions">
                <a href="pages/contact.php" class="wd-btn wd-btn--primary">Start a Website Project</a>
                <a href="pages/services.php" class="wd-btn wd-btn--ghost">View Services</a>
            </div>
        </div>
    </section>
</main>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/portfolios/web-development.js"></script>
</body>
</html>
