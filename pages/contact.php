<?php
$rootPath = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . ($rootPath ? $rootPath : '') . '/';
$status = $_GET['status'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uidigitax | Contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <base href="<?php echo $baseUrl; ?>">
    <link rel="stylesheet" href="assets/css/contact.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<main class="page-shell contact-shell">
    <section class="page-hero contact-hero">
        <div class="page-hero__inner contact-hero__inner">
            <div class="contact-hero__copy">
                <span class="page-pill">Contact UIDigitax</span>
                <h1>Let’s shape the next digital move for your brand with more clarity, confidence, and momentum.</h1>
                <p>Whether you need a website, stronger SEO, content planning, social media management, creative design, or video editing, UIDigitax is ready to help define the right next step.</p>
                <div class="page-actions">
                    <a href="#contactForm" class="page-btn page-btn--primary">Start Your Inquiry</a>
                    <a href="pages/services.php" class="page-btn page-btn--ghost">Explore Services</a>
                </div>
            </div>
            <div class="contact-hero__panel" data-reveal-card>
                <div class="contact-hero__panel-item">
                    <span class="contact-hero__label">Email</span>
                    <a href="mailto:contact@uidigitax.com">contact@uidigitax.com</a>
                </div>
                <div class="contact-hero__panel-item">
                    <span class="contact-hero__label">Call</span>
                    <a href="tel:+923169396919">+923169396919</a>
                </div>
                <div class="contact-hero__panel-item">
                    <span class="contact-hero__label">Response Window</span>
                    <strong>Usually within 24 hours</strong>
                </div>
                <div class="contact-hero__pill-row">
                    <span>Web</span>
                    <span>SEO</span>
                    <span>Social</span>
                    <span>Creative</span>
                    <span>Video</span>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section contact-links">
        <div class="contact-links__grid">
            <article class="contact-links__card" data-reveal-card data-tilt-card>
                <span class="contact-links__kicker">Direct Email</span>
                <h3>Share your project brief.</h3>
                <p>Send your goals, timeline, or current challenges and we’ll guide you toward the right digital direction.</p>
                <a href="mailto:contact@uidigitax.com" class="page-btn page-btn--ghost">Email UIDigitax</a>
            </article>
            <article class="contact-links__card" data-reveal-card data-tilt-card>
                <span class="contact-links__kicker">Phone Support</span>
                <h3>Talk through your goals directly.</h3>
                <p>If you prefer a faster conversation, reach out by phone and we can discuss what kind of support makes sense.</p>
                <a href="tel:+923169396919" class="page-btn page-btn--ghost">Call Now</a>
            </article>
            <article class="contact-links__card" data-reveal-card data-tilt-card>
                <span class="contact-links__kicker">Service Fit</span>
                <h3>Find the right service mix.</h3>
                <p>We help brands connect strategy, websites, search, content, campaigns, and creative production into one system.</p>
                <a href="pages/services.php" class="page-btn page-btn--ghost">View Services</a>
            </article>
        </div>
    </section>

    <section class="page-section contact-main">
        <div class="contact-main__layout">
            <div class="contact-main__sidebar">
                <article class="contact-main__panel" data-reveal-card>
                    <span class="page-pill">Reach Out</span>
                    <h3>Contact UIDigitax directly.</h3>
                    <p>Share a little about your brand, project, or growth goal and we’ll follow up with the right next steps.</p>
                    <div class="contact-main__items">
                        <div class="contact-main__item">
                            <strong>Email</strong>
                            <a href="mailto:contact@uidigitax.com">contact@uidigitax.com</a>
                        </div>
                        <div class="contact-main__item">
                            <strong>Phone</strong>
                            <a href="tel:+923169396919">+923169396919</a>
                        </div>
                        <div class="contact-main__item">
                            <strong>Focus</strong>
                            <span>Website Development, SEO, Social Media, Digital Marketing, Creative Design, and Video Editing</span>
                        </div>
                    </div>
                </article>
                <article class="contact-main__panel contact-main__panel--soft" data-reveal-card>
                    <span class="page-pill">What Happens Next</span>
                    <ul class="contact-main__steps">
                        <li>We review your message and project needs.</li>
                        <li>We suggest the most relevant service direction.</li>
                        <li>We follow up with the right next steps for your brand.</li>
                    </ul>
                </article>
            </div>

            <div class="contact-main__form-shell" id="contactForm" data-reveal-card>
                <span class="page-pill">Project Inquiry</span>
                <h3>Tell us what you are building.</h3>
                <p>Use the form below to share your goals, current gaps, or the type of support you need from UIDigitax.</p>

                <?php if ($status === 'success'): ?>
                    <div class="contact-status contact-status--success">
                        <strong>Message sent successfully.</strong>
                        <span>Thanks for reaching out. UIDigitax will get back to you shortly.</span>
                    </div>
                <?php elseif ($status === 'error'): ?>
                    <div class="contact-status contact-status--error">
                        <strong>Something is missing.</strong>
                        <span>Please fill in the required fields and try again.</span>
                    </div>
                <?php endif; ?>

                <form class="page-form contact-form" action="includes/contact.php" method="post">
                    <div class="page-form__grid">
                        <label>
                            Name
                            <input type="text" name="name" required>
                        </label>
                        <label>
                            Email
                            <input type="email" name="email" required>
                        </label>
                    </div>
                    <div class="page-form__grid">
                        <label>
                            Phone
                            <input type="text" name="phone">
                        </label>
                        <label>
                            Interested Service
                            <select name="service_interest">
                                <option value="">Select a service</option>
                                <option value="Website Development">Website Development</option>
                                <option value="SEO">SEO</option>
                                <option value="Social Media Management">Social Media Management</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Creative Design">Creative Design</option>
                                <option value="Video Editing">Video Editing</option>
                            </select>
                        </label>
                    </div>
                    <label>
                        Message
                        <textarea name="message" required placeholder="Tell us about your brand, your goals, and the kind of support you need."></textarea>
                    </label>
                    <button type="submit" class="page-btn page-btn--primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <section class="page-section contact-faq">
        <div class="page-section__heading contact-faq__heading">
            <span class="page-pill">Common Questions</span>
            <h2>Helpful answers before you reach out.</h2>
        </div>
        <div class="contact-faq__list">
            <article class="contact-faq__item" data-faq-item data-reveal-card>
                <button type="button" class="contact-faq__toggle" data-faq-toggle aria-expanded="false">
                    <span>What kind of businesses do you work with?</span>
                    <span class="contact-faq__icon" aria-hidden="true">+</span>
                </button>
                <div class="contact-faq__content" data-faq-content hidden>
                    <p>We work with brands that want stronger digital clarity, from growing businesses that need better structure to companies looking for sharper execution across design, websites, search, and content.</p>
                </div>
            </article>
            <article class="contact-faq__item" data-faq-item data-reveal-card>
                <button type="button" class="contact-faq__toggle" data-faq-toggle aria-expanded="false">
                    <span>Can I contact you for one service or a full digital package?</span>
                    <span class="contact-faq__icon" aria-hidden="true">+</span>
                </button>
                <div class="contact-faq__content" data-faq-content hidden>
                    <p>Both. Some clients reach out for a single service like SEO or website development, while others need a connected approach across multiple digital areas.</p>
                </div>
            </article>
            <article class="contact-faq__item" data-faq-item data-reveal-card>
                <button type="button" class="contact-faq__toggle" data-faq-toggle aria-expanded="false">
                    <span>How soon will UIDigitax respond?</span>
                    <span class="contact-faq__icon" aria-hidden="true">+</span>
                </button>
                <div class="contact-faq__content" data-faq-content hidden>
                    <p>We usually respond within 24 hours, and sooner when possible. The more context you share in your message, the more useful our first reply can be.</p>
                </div>
            </article>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/contact.js"></script>
</body>
</html>
