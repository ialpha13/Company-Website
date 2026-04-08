<?php
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$floating_tags = [
    ['label' => 'Market Strategy',   'class' => 'tag--tl'],
    ['label' => 'Product Positioning','class' => 'tag--tr'],
    ['label' => 'Optimize',          'class' => 'tag--ml'],
    ['label' => 'Innovation',        'class' => 'tag--mr'],
    ['label' => 'Growth Analytics',  'class' => 'tag--bc'],
];
$logos = ['CloudWatch', 'Boltshift', 'Epicurious', 'Sisyphus', 'Nietzsche', 'Quotient', 'Capsule'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Avenor — Consulting Partner for Startups</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/home.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
</head>
<body>

<!-- NAV -->
<?php include 'assets/php/navbar.php'; ?>

<!-- HERO -->
<section class="hero" id="hero">
    <div class="hero__bg">
        <div class="hero__vignette"></div>
        <div class="hero__grain"></div>
        <div class="hero__image-wrap">
            <div class="hero__portrait"></div>
            <div class="hero__tags">
                <?php foreach ($floating_tags as $tag): ?>
                    <div class="tag tag--floating <?php echo $tag['class']; ?>">
                        <?php echo $tag['label']; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="hero__content">
        <span class="hero__eyebrow">Growth strategy, design, and execution</span>
        <h1 class="hero__heading" data-text="A Consulting Partner for Startups Ready to Scale.">
            <span class="hero__heading-line">
                <span class="hero__typewriter" id="heroTypewriter"></span>
                <span class="hero__caret" aria-hidden="true"></span>
            </span>
        </h1>
        <p class="hero__sub">
            From strategic planning to digital transformation, we help growing companies.
        </p>
        <div class="hero__cta">
            <a href="#" class="btn btn--primary">Book Consultation</a>
            <a href="#" class="btn btn--ghost">View Services</a>
        </div>
    </div>

</section>

<!-- ABOUT -->
<section class="about" id="about">
    <div class="about__inner">
        <div class="about__label">
            <span class="pill">✦ About Us</span>
        </div>
        <div class="about__body">
            <h2 class="about__heading">
                Great companies are built on clear decisions.
                We combine strategic insight
                <span class="highlight">✦ operational</span>
                expertise, and modern technology to help
                businesses move faster.
            </h2>
        </div>
    </div>
    <div class="about__badge">
        <span class="badge">
            <span class="badge__stars">★★★★★</span>
            <span class="badge__text">4.9 · Chosen by 60+ company in worldwide</span>
        </span>
    </div>
</section>

<!-- PLANS -->
<section class="plans" id="services">
    <div class="plans__header">
        <h2>Built for Every Stage of Growth.</h2>
    </div>
    <div class="plans__cards">
        <article class="plan-card">
            <span class="plan-card__label">Growth Blueprint</span>
            <h3>For founders who need a clear plan between ideas and revenue.</h3>
            <div class="plan-card__price"><span>$2,500</span>/mo</div>
            <ul class="plan-card__list">
                <li>Vision audit + brand roadmap</li>
                <li>Stakeholder alignment</li>
                <li>Growth strategy blueprint & buyer journey</li>
            </ul>
            <a href="#" class="btn btn--ghost plan-card__btn">Get Started</a>
        </article>
        <article class="plan-card plan-card--featured">
            <span class="plan-card__label">Scale Systems</span>
            <h3>Growth-ready systems, process, and tech designed for scale.</h3>
            <div class="plan-card__price"><span>$5,000</span>/mo</div>
            <ul class="plan-card__list">
                <li>Value framework & funnel audit</li>
                <li>Product-market fit optimization</li>
                <li>Strategy & launch enablement</li>
                <li>Implementation guidance with your team</li>
            </ul>
            <a href="#" class="btn btn--primary plan-card__btn">Get Started</a>
        </article>
        <article class="plan-card">
            <span class="plan-card__label">Growth Partner</span>
            <h3>Full execution offering with milestone-driven growth velocity.</h3>
            <div class="plan-card__price"><span>$2,000</span>/mo</div>
            <ul class="plan-card__list">
                <li>Strategic planning & growth advisory</li>
                <li>Market research & go-to-market optimization</li>
                <li>Performance tracking & optimization</li>
                <li>Data-driven growth flywheel decisions</li>
            </ul>
            <a href="#" class="btn btn--ghost plan-card__btn">Get Started</a>
        </article>
    </div>
</section>

<section class="scale-cta" id="portfolio">
    <div class="scale-cta__inner">
        <h2>Ready to Scale Your Business with Clarity?</h2>
        <p>Let us build a strategy that future-proofs your growth and keeps execution moving.</p>
        <a href="#" class="btn btn--primary">Book Consultation</a>
    </div>
</section>

<footer class="site-footer" id="contact">
    <div class="footer__grid">
        <div class="footer__brand">
            <p class="footer__title">Avenor</p>
            <p>We help founders and product companies scale with clarity.</p>
            <a href="mailto:hello@avenor.com" class="footer__contact">hello@avenor.com</a>
            <p class="footer__meta">8007 Pleasant Rd, Ridgewood, New Jersey</p>
        </div>
        <div class="footer__menu">
            <p class="footer__menu-title">Menu</p>
            <a href="#">Home</a>
            <a href="#about">About Us</a>
            <a href="#services">Our Services</a>
            <a href="#resources">Resources</a>
            <a href="#testimonials">Testimonials</a>
            <a href="#pricing">Pricing</a>
        </div>
    </div>
    <div class="footer__bottom">© 2026 Avenor. All rights reserved.</div>
</footer>

<script src="assets/js/home.js"></script>
<script src="assets/js/navbar.js"></script>
</body>
</html>
