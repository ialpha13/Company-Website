<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$nav_tabs = [
    ['label' => 'Home', 'href' => 'pages/home.php#hero', 'id' => 'home', 'active' => $currentPage === 'home.php'],
    ['label' => 'Services', 'href' => 'pages/services.php', 'id' => 'services', 'active' => in_array($currentPage, ['services.php', 'service-portfolio.php'], true)],
    ['label' => 'Portfolio', 'href' => 'pages/portfolio.php', 'id' => 'portfolio', 'active' => $currentPage === 'portfolio.php'],
    ['label' => 'Blog', 'href' => 'pages/blog.php', 'id' => 'blog', 'active' => $currentPage === 'blog.php'],
    ['label' => 'About', 'href' => 'pages/about.php', 'id' => 'about', 'active' => $currentPage === 'about.php'],
    ['label' => 'Contact', 'href' => 'pages/contact.php', 'id' => 'contact', 'active' => $currentPage === 'contact.php'],
];
?>

<header class="agro-nav" id="agroNav">
    <nav class="agro-nav__inner">

        <a href="pages/home.php" class="agro-nav__logo">
            <img src="assets/images/logo2.png" alt="UIDIGITAX" class="agro-nav__logo-img">
        </a>

        <div class="agro-nav__tabs-wrap">
            <ul class="agro-nav__tabs" id="agroTabs">
                <?php foreach ($nav_tabs as $tab): ?>
                <li>
                    <a href="<?= htmlspecialchars($tab['href']) ?>"
                       class="agro-nav__tab<?= $tab['active'] ? ' agro-nav__tab--active' : '' ?>"
                       data-tab="<?= htmlspecialchars($tab['id']) ?>">
                        <?= htmlspecialchars($tab['label']) ?>
                    </a>
                </li>
                <?php endforeach; ?>
                <li class="agro-nav__indicator" id="tabIndicator" aria-hidden="true"></li>
            </ul>
        </div>

        <div class="agro-nav__actions">
            <button class="agro-nav__settings" id="settingsBtn" aria-label="Settings">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33
                             1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33
                             l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4
                             h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06
                             A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51
                             a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9
                             a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <button class="agro-nav__avatar" id="avatarBtn" aria-label="User profile">
                <img src="assets/images/hero.png" alt="User Avatar" class="agro-nav__avatar-img" />
            </button>

            <button class="agro-nav__hamburger" id="navHamburger" aria-label="Open menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

    </nav>

    <div class="agro-nav__mobile-menu" id="mobileMenu" aria-hidden="true">
        <ul class="agro-nav__mobile-tabs">
            <?php foreach ($nav_tabs as $tab): ?>
            <li>
                <a href="<?= htmlspecialchars($tab['href']) ?>"
                   class="agro-nav__mobile-tab<?= $tab['active'] ? ' agro-nav__mobile-tab--active' : '' ?>"
                   data-tab="<?= htmlspecialchars($tab['id']) ?>">
                    <?= htmlspecialchars($tab['label']) ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="agro-nav__mobile-actions">
            <button class="agro-nav__settings" aria-label="Settings">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18">
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33
                             1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33
                             l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4
                             h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06
                             A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51
                             a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9
                             a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <button class="agro-nav__avatar" aria-label="User profile">
                <img src="assets/images/hero.png" alt="User Avatar" class="agro-nav__avatar-img" />
            </button>
        </div>
    </div>

</header>
