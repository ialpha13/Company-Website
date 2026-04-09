<?php
$rootPath = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . ($rootPath ? $rootPath : '') . '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uidigitax | About</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/about.css" />
</head>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<main class="page-shell">
    <section class="page-hero">
        <div class="page-hero__inner">
            <span class="page-pill">About uidigitax</span>
            <h1>A digital agency built to help ambitious brands move with more clarity and impact.</h1>
            <p>UIDigitax brings together strategy, design, technology, and marketing to create digital experiences that look sharp, communicate clearly, and support measurable brand growth.</p>
            <div class="page-actions">
                <a href="pages/services.php" class="page-btn page-btn--primary">See What We Do</a>
                <a href="pages/contact.php" class="page-btn page-btn--ghost">Get in Touch</a>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="page-richtext">
            <div>
                <span class="page-pill">Who We Are</span>
                <h3>We build digital ecosystems, not isolated deliverables.</h3>
                <p>In a fast-moving digital landscape, brands need more than visibility. They need a stronger story, a clearer structure, and execution that connects strategy to measurable growth. UIDigitax exists to make that happen.</p>
            </div>
            <div>
                <h3>What We Believe</h3>
                <p>Strong digital work balances aesthetics, performance, and relevance. That means every website, campaign, content system, and design asset should do more than look good. It should support the brand's next step.</p>
            </div>
            <div>
                <h3>How We Work</h3>
                <p>We start with understanding: your business, your audience, your market, and your current digital gaps. From there, we shape a practical path forward across website development, SEO, social media management, digital marketing, creative design, and video editing.</p>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="page-section__heading">
            <span class="page-pill">Why Brands Choose Us</span>
            <h2>Creative precision paired with strategic execution.</h2>
        </div>
        <div class="page-grid page-grid--three">
            <article class="page-card">
                <span class="page-card__kicker">Clarity</span>
                <h3>Focused digital direction</h3>
                <p>We simplify decisions and align your presence around what actually drives brand growth.</p>
            </article>
            <article class="page-card">
                <span class="page-card__kicker">Creativity</span>
                <h3>Refined design thinking</h3>
                <p>We create work that feels premium, intentional, and consistent across every touchpoint.</p>
            </article>
            <article class="page-card">
                <span class="page-card__kicker">Execution</span>
                <h3>Built to perform</h3>
                <p>Our work is shaped around outcomes, not just output, so performance stays part of the process.</p>
            </article>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/about.js"></script>
</body>
</html>
