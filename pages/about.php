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
    <link rel="stylesheet" href="assets/css/about.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<main class="page-shell">
    <section class="page-hero about-hero">
        <div class="about-hero__card">
            <div class="about-hero__media">
                <div class="about-hero__scene" aria-hidden="true">
                    <span class="about-hero__layer about-hero__layer--grid"></span>
                    <span class="about-hero__layer about-hero__layer--ring"></span>
                    <span class="about-hero__layer about-hero__layer--card about-hero__layer--card-one"></span>
                    <span class="about-hero__layer about-hero__layer--card about-hero__layer--card-two"></span>
                    <span class="about-hero__layer about-hero__layer--orb"></span>
                    <span class="about-hero__layer about-hero__layer--beam"></span>
                </div>
                <div class="about-hero__media-copy">
                    <h1>ABOUT US</h1>
                    <p class="about-hero__subtitle">Your trusted digital growth partner</p>
                </div>
                <a href="#about-story" class="about-hero__scroll" aria-label="Scroll to about story">
                    <span></span>
                </a>
            </div>
        </div>
        <div class="about-hero__intro">
            <h2 class="about-hero__big-headline">A digital agency built to help ambitious brands move with clarity and impact.</h2>
        </div>
    </section>

    <section class="page-section about-metrics" id="about-story">
        <span class="about-metrics__eyebrow">About Us</span>
        <h2 class="about-metrics__section-title">Get to Know UIDigitax</h2>
        <div class="about-metrics__grid">
            <article class="about-metrics__card" data-reveal-card data-tilt-card>
                <strong data-count="6">6+</strong>
                <span class="about-metrics__label">Core Services Offered</span>
            </article>
            <article class="about-metrics__card" data-reveal-card data-tilt-card>
                <strong data-count="360">360°</strong>
                <span class="about-metrics__label">Brand Focus Coverage</span>
            </article>
            <div class="about-metrics__content">
                <p>Elevate every brand touchpoint, embrace every opportunity. Digital growth awaits—let's make it unforgettable.</p>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="page-richtext about-story">
            <div class="about-story__copy">
                <span class="page-pill">Who We Are</span>
                <h3>We build digital ecosystems, not isolated deliverables.</h3>
                <p>In a fast-moving digital landscape, brands need more than visibility. They need a stronger story, a clearer structure, and execution that connects strategy to measurable growth. UIDigitax exists to make that happen.</p>
            </div>
            <div class="about-story__column">
                <h3>What We Believe</h3>
                <p>Strong digital work balances aesthetics, performance, and relevance. That means every website, campaign, content system, and design asset should do more than look good. It should support the brand's next step.</p>
            </div>
            <div class="about-story__column">
                <h3>How We Work</h3>
                <p>We start with understanding: your business, your audience, your market, and your current digital gaps. From there, we shape a practical path forward across website development, SEO, social media management, digital marketing, creative design, and video editing.</p>
            </div>
            <aside class="about-story__panel" data-reveal-card>
                <span class="page-pill">Why It Works</span>
                <ul class="about-story__list">
                    <li>Clear strategy before execution</li>
                    <li>Consistent design language across channels</li>
                    <li>Marketing and content aligned with brand goals</li>
                    <li>Digital systems built to scale with the business</li>
                </ul>
            </aside>
        </div>
    </section>

    <section class="page-section about-values">
        <div class="page-section__heading">
            <span class="page-pill">Why Brands Choose Us</span>
            <h2>Creative precision paired with strategic execution.</h2>
        </div>
        <div class="page-grid page-grid--three">
            <article class="page-card about-values__card" data-reveal-card data-tilt-card>
                <span class="page-card__kicker">Clarity</span>
                <h3>Focused digital direction</h3>
                <p>We simplify decisions and align your presence around what actually drives brand growth.</p>
            </article>
            <article class="page-card about-values__card" data-reveal-card data-tilt-card>
                <span class="page-card__kicker">Creativity</span>
                <h3>Refined design thinking</h3>
                <p>We create work that feels premium, intentional, and consistent across every touchpoint.</p>
            </article>
            <article class="page-card about-values__card" data-reveal-card data-tilt-card>
                <span class="page-card__kicker">Execution</span>
                <h3>Built to perform</h3>
                <p>Our work is shaped around outcomes, not just output, so performance stays part of the process.</p>
            </article>
        </div>
    </section>

    <section class="page-section about-process">
        <div class="page-section__heading about-process__heading">
            <span class="page-pill">How We Collaborate</span>
            <h2>A professional process designed to keep ideas clear, delivery sharp, and momentum visible.</h2>
        </div>
        <div class="about-process__layout">
            <div class="about-process__steps">
                <article class="about-process__step" data-reveal-card>
                    <span class="about-process__index">01</span>
                    <div>
                        <h3>Understand the Brand</h3>
                        <p>We begin with business goals, audience context, and the digital gaps that are slowing growth.</p>
                    </div>
                </article>
                <article class="about-process__step" data-reveal-card>
                    <span class="about-process__index">02</span>
                    <div>
                        <h3>Define the Direction</h3>
                        <p>We shape the structure, message, and creative system needed to move the brand forward with confidence.</p>
                    </div>
                </article>
                <article class="about-process__step" data-reveal-card>
                    <span class="about-process__index">03</span>
                    <div>
                        <h3>Build With Precision</h3>
                        <p>Design, development, content, and campaign execution are produced with consistency and performance in mind.</p>
                    </div>
                </article>
                <article class="about-process__step" data-reveal-card>
                    <span class="about-process__index">04</span>
                    <div>
                        <h3>Refine and Scale</h3>
                        <p>We improve what is working, strengthen what is missing, and help the digital system support long-term growth.</p>
                    </div>
                </article>
            </div>
            <div class="about-process__visual" data-reveal-card>
                <div class="about-process__rings">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="about-process__visual-copy">
                    <span class="page-pill">UIDigitax Method</span>
                    <h3>Strategy, design, and growth working in one connected rhythm.</h3>
                    <p>Our process helps brands avoid scattered execution by turning insight into structure and structure into consistent digital performance.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section about-team">
        <div class="page-section__heading about-team__heading">
            <span class="page-pill">Our Team</span>
            <h2>The people behind UIDigitax bring strategy, design, content, and execution into one clear system.</h2>
            <p>We work like a focused digital partner, combining complementary skills so brands receive thoughtful direction, polished delivery, and momentum that is easier to sustain.</p>
        </div>
        <div class="about-team__grid">
            <article class="about-team__card" data-reveal-card data-tilt-card>
                <div class="about-team__media about-team__media--strategy">
                    <span class="about-team__badge">Strategy</span>
                </div>
                <div class="about-team__body">
                    <span class="about-team__role">Founder & Strategy Lead</span>
                    <h3>Ali Raza</h3>
                    <p>Shapes brand direction, digital planning, and service alignment so each project starts with stronger clarity and better priorities.</p>
                </div>
            </article>
            <article class="about-team__card" data-reveal-card data-tilt-card>
                <div class="about-team__media about-team__media--design">
                    <span class="about-team__badge">Design</span>
                </div>
                <div class="about-team__body">
                    <span class="about-team__role">Creative Design Director</span>
                    <h3>Sarah Khan</h3>
                    <p>Leads visual systems, interface direction, and campaign design to ensure every brand touchpoint feels refined and coherent.</p>
                </div>
            </article>
            <article class="about-team__card" data-reveal-card data-tilt-card>
                <div class="about-team__media about-team__media--growth">
                    <span class="about-team__badge">Growth</span>
                </div>
                <div class="about-team__body">
                    <span class="about-team__role">SEO & Marketing Specialist</span>
                    <h3>Usman Javed</h3>
                    <p>Builds search visibility, campaign structure, and content direction that help brands grow with smarter, measurable digital performance.</p>
                </div>
            </article>
            <article class="about-team__card" data-reveal-card data-tilt-card>
                <div class="about-team__media about-team__media--content">
                    <span class="about-team__badge">Content</span>
                </div>
                <div class="about-team__body">
                    <span class="about-team__role">Content & Video Producer</span>
                    <h3>Maham Ahmed</h3>
                    <p>Transforms ideas into engaging social media content, motion-led storytelling, and polished creative assets built for modern platforms.</p>
                </div>
            </article>
        </div>
    </section>

    <section class="page-cta about-cta">
        <div class="page-cta__inner">
            <span class="page-pill">Work With UIDigitax</span>
            <h2>Looking for a digital partner that combines clear thinking with polished execution?</h2>
            <p>We help brands build websites, marketing systems, search visibility, creative assets, and content experiences that feel stronger and perform better.</p>
            <div class="page-actions">
                <a href="pages/contact.php" class="page-btn page-btn--primary">Start a Conversation</a>
                <a href="pages/portfolio.php" class="page-btn page-btn--ghost">View Portfolio</a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/about.js"></script>
</body>
</html>
