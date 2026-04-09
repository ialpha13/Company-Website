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
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/contact.css" />
</head>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<main class="page-shell">
    <section class="page-hero">
        <div class="page-hero__inner">
            <span class="page-pill">Contact</span>
            <h1>Let’s talk about the next digital move for your brand.</h1>
            <p>Whether you need a website, SEO support, content planning, social media management, creative design, or video editing, UIDigitax is ready to help shape the right solution.</p>
        </div>
    </section>

    <section class="page-section">
        <div class="page-contact">
            <div class="page-contact__meta">
                <span class="page-pill">Reach Out</span>
                <h3>Contact UIDigitax directly.</h3>
                <p>Share a little about your brand, project, or growth goal and we’ll follow up with the right next steps.</p>
                <div class="page-contact__items">
                    <div class="page-contact__item">
                        <strong>Email</strong>
                        <a href="mailto:contact@uidigitax.com">contact@uidigitax.com</a>
                    </div>
                    <div class="page-contact__item">
                        <strong>Phone</strong>
                        <a href="tel:+923169396919">+923169396919</a>
                    </div>
                    <div class="page-contact__item">
                        <strong>Focus</strong>
                        <span>Website Development, SEO, Social Media, Digital Marketing, Creative Design, Video Editing</span>
                    </div>
                </div>
            </div>

            <div class="page-contact__form">
                <span class="page-pill">Project Inquiry</span>
                <?php if ($status === 'success'): ?>
                    <p>Thanks, your message has been sent successfully.</p>
                <?php elseif ($status === 'error'): ?>
                    <p>Please fill in the required fields and try again.</p>
                <?php endif; ?>
                <form class="page-form" action="includes/contact.php" method="post">
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
                    <label>
                        Phone
                        <input type="text" name="phone">
                    </label>
                    <label>
                        Message
                        <textarea name="message" required></textarea>
                    </label>
                    <button type="submit" class="page-btn page-btn--primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/contact.js"></script>
</body>
</html>
