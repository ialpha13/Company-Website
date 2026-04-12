<?php
$rootPath = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . ($rootPath ? $rootPath : '') . '/';

$reels = [
    [
        'title' => 'Launch Reel',
        'type' => 'Promotional Video',
        'format' => '9:16 Social Cut',
        'image' => 'assets/images/hero.png',
        'accent' => 'amber',
        'summary' => 'Fast opening hook, branded pacing, captions, and a clear product reveal for campaign launch.',
        'tags' => ['Hook Edit', 'Captions', 'Sound Design'],
    ],
    [
        'title' => 'Founder Story',
        'type' => 'Brand Storytelling',
        'format' => 'Vertical Reel',
        'image' => 'assets/images/hero2.png',
        'accent' => 'green',
        'summary' => 'A human-led narrative edit shaped around trust, rhythm, and brand personality.',
        'tags' => ['Story Cut', 'Color', 'Voiceover'],
    ],
    [
        'title' => 'Product Motion',
        'type' => 'Ad Creative',
        'format' => 'Paid Social',
        'image' => 'assets/images/blogs/DigitalBrandMoment.png',
        'accent' => 'gold',
        'summary' => 'A product-focused edit with sharp transitions, benefit callouts, and scroll-stopping movement.',
        'tags' => ['Ads', 'Transitions', 'Retargeting'],
    ],
    [
        'title' => 'Event Highlights',
        'type' => 'Highlight Reel',
        'format' => 'Landscape + Reels',
        'image' => 'assets/images/hero3.jpeg',
        'accent' => 'green',
        'summary' => 'A recap edit built from moments, crowd energy, speaker clips, and branded closing frames.',
        'tags' => ['Recap', 'Music Sync', 'Highlights'],
    ],
    [
        'title' => 'Trend Cut',
        'type' => 'Short-Form Content',
        'format' => '15s Reel',
        'image' => 'assets/images/hero2.png',
        'accent' => 'amber',
        'summary' => 'A fast short-form cut designed around retention, captions, jump cuts, and platform behavior.',
        'tags' => ['Reels', 'Jump Cuts', 'Retention'],
    ],
];

$featured = $reels[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uidigitax | Video Editing Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/portfolios/video-editing.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>
<body>
<?php include dirname(__DIR__) . '/includes/navbar.php'; ?>

<main class="ve-page">
    <section class="ve-hero" data-ve-reveal>
        <div class="ve-hero__copy">
            <span class="ve-pill">Video Editing Portfolio</span>
            <h1>Video edits built for attention, rhythm, and retention.</h1>
            <p>Explore short-form reels, campaign edits, brand stories, and walkthrough-style previews shaped for modern digital platforms.</p>
            <div class="ve-actions">
                <a href="pages/contact.php" class="ve-btn ve-btn--primary">Start a Video Project</a>
                <a href="#reelWall" class="ve-btn ve-btn--ghost">View Reel Types</a>
            </div>
        </div>

        <div class="ve-hero__stage" aria-hidden="true">
            <div class="ve-cinema-card ve-cinema-card--main">
                <div class="ve-cinema-card__visual" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.68)), url('<?php echo htmlspecialchars($featured['image']); ?>');">
                    <span class="ve-play"></span>
                </div>
                <div class="ve-cinema-card__caption">
                    <span><?php echo htmlspecialchars($featured['type']); ?></span>
                    <strong><?php echo htmlspecialchars($featured['title']); ?></strong>
                </div>
            </div>
            <div class="ve-reel-float ve-reel-float--one" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.64)), url('<?php echo htmlspecialchars($reels[1]['image']); ?>');"></div>
            <div class="ve-reel-float ve-reel-float--two" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.64)), url('<?php echo htmlspecialchars($reels[2]['image']); ?>');"></div>
        </div>
    </section>

    <section class="ve-featured" data-ve-reveal>
        <div class="ve-section-heading">
            <span class="ve-pill">Featured Reel</span>
            <h2><?php echo htmlspecialchars($featured['title']); ?></h2>
            <p><?php echo htmlspecialchars($featured['summary']); ?></p>
        </div>
        <div class="ve-featured__frame">
            <div class="ve-featured__visual" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.01), rgba(8,10,8,0.74)), url('<?php echo htmlspecialchars($featured['image']); ?>');">
                <button class="ve-play ve-play--button" type="button" aria-label="Play featured reel"></button>
                <div class="ve-featured__meta">
                    <span><?php echo htmlspecialchars($featured['format']); ?></span>
                    <h3><?php echo htmlspecialchars($featured['type']); ?></h3>
                </div>
            </div>
            <div class="ve-featured__notes">
                <?php foreach ($featured['tags'] as $tag): ?>
                    <span><?php echo htmlspecialchars($tag); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="ve-categories" data-ve-reveal>
        <div class="ve-section-heading">
            <span class="ve-pill">Reel Types</span>
            <h2>Edits for launches, stories, ads, events, and short-form growth.</h2>
        </div>
        <div class="ve-category-grid">
            <?php foreach ($reels as $reel): ?>
                <article class="ve-category-card ve-category-card--<?php echo htmlspecialchars($reel['accent']); ?>" data-ve-reveal>
                    <div class="ve-category-card__visual" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.7)), url('<?php echo htmlspecialchars($reel['image']); ?>');">
                        <button class="ve-play ve-play--small" type="button" aria-label="Play <?php echo htmlspecialchars($reel['title']); ?>"></button>
                    </div>
                    <div class="ve-category-card__body">
                        <span><?php echo htmlspecialchars($reel['format']); ?></span>
                        <h3><?php echo htmlspecialchars($reel['title']); ?></h3>
                        <p><?php echo htmlspecialchars($reel['summary']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="ve-reel-wall" id="reelWall" data-ve-reveal>
        <div class="ve-section-heading">
            <span class="ve-pill">Vertical Reel Wall</span>
            <h2>Short-form previews designed for mobile attention.</h2>
        </div>
        <div class="ve-reel-wall__grid">
            <?php foreach ($reels as $index => $reel): ?>
                <article class="ve-phone-reel" data-ve-reveal>
                    <div class="ve-phone-reel__screen" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.02), rgba(8,10,8,0.7)), url('<?php echo htmlspecialchars($reel['image']); ?>');">
                        <span><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                        <button class="ve-play ve-play--mini" type="button" aria-label="Play <?php echo htmlspecialchars($reel['title']); ?>"></button>
                    </div>
                    <h3><?php echo htmlspecialchars($reel['title']); ?></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="ve-timeline" data-ve-reveal>
        <div class="ve-section-heading">
            <span class="ve-pill">Edit Timeline</span>
            <h2>From raw footage to platform-ready story.</h2>
        </div>
        <div class="ve-timeline__track">
            <article data-ve-reveal><span>01</span><strong>Raw Footage</strong><p>Sort the strongest moments and remove noise.</p></article>
            <article data-ve-reveal><span>02</span><strong>Cut</strong><p>Build rhythm, structure, hook, and retention.</p></article>
            <article data-ve-reveal><span>03</span><strong>Color</strong><p>Polish mood, contrast, and brand feel.</p></article>
            <article data-ve-reveal><span>04</span><strong>Captions</strong><p>Add readable motion captions and callouts.</p></article>
            <article data-ve-reveal><span>05</span><strong>Export</strong><p>Prepare platform-ready versions and formats.</p></article>
        </div>
    </section>

    <section class="ve-before-after" data-ve-reveal>
        <div class="ve-section-heading">
            <span class="ve-pill">Before / After</span>
            <h2>From raw frame to polished digital story.</h2>
        </div>
        <div class="ve-compare">
            <div class="ve-compare__frame ve-compare__frame--raw" style="background-image: linear-gradient(180deg, rgba(8,10,8,0.04), rgba(8,10,8,0.52)), url('assets/images/hero3.jpeg');">
                <span>Raw</span>
            </div>
            <div class="ve-compare__frame ve-compare__frame--edit" style="background-image: linear-gradient(180deg, rgba(107,76,30,0.16), rgba(8,10,8,0.6)), url('assets/images/hero.png');">
                <span>Edited</span>
            </div>
        </div>
    </section>

    <section class="ve-deliverables" data-ve-reveal>
        <div class="ve-section-heading">
            <span class="ve-pill">What We Deliver</span>
            <h2>Motion assets built for social, campaigns, and brand storytelling.</h2>
        </div>
        <div class="ve-deliverables__grid">
            <span>Short-form reels</span>
            <span>Ad creatives</span>
            <span>Motion captions</span>
            <span>Sound design</span>
            <span>Color grading</span>
            <span>Transitions</span>
            <span>Platform exports</span>
            <span>Thumbnail frames</span>
        </div>
    </section>

    <section class="ve-cta" data-ve-reveal>
        <div class="ve-cta__inner">
            <span class="ve-pill">Edit With UIDigitax</span>
            <h2>Need videos that feel sharp, fast, and ready for social?</h2>
            <p>We can turn your footage, ideas, and campaign goals into polished edits built for attention and action.</p>
            <div class="ve-actions">
                <a href="pages/contact.php" class="ve-btn ve-btn--primary">Start a Video Project</a>
                <a href="pages/services.php" class="ve-btn ve-btn--ghost">View Services</a>
            </div>
        </div>
    </section>
</main>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/portfolios/video-editing.js"></script>
</body>
</html>
