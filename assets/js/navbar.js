/**
 * AgroControl Navbar — navbar.js
 * Handles: sliding tab indicator, scroll opacity, settings spin
 */

(function () {
    'use strict';

    const nav       = document.getElementById('agroNav');
    const tabs      = document.querySelectorAll('.agro-nav__tab');
    const indicator = document.getElementById('tabIndicator');
    const tabsList  = document.getElementById('agroTabs');

    /* ── Sliding indicator ────────────────────────────────── */
    function moveIndicator(activeTab) {
        if (!indicator || !activeTab || !tabsList) return;

        const listRect = tabsList.getBoundingClientRect();
        const tabRect  = activeTab.getBoundingClientRect();

        indicator.style.width     = tabRect.width  + 'px';
        indicator.style.transform = 'translateX(' + (tabRect.left - listRect.left - 4) + 'px)';
    }

    function setActiveTab(clickedTab) {
        tabs.forEach(t => t.classList.remove('agro-nav__tab--active'));
        clickedTab.classList.add('agro-nav__tab--active');
        moveIndicator(clickedTab);
    }

    /* Initialise indicator to the currently active tab */
    function initIndicator() {
        const active = document.querySelector('.agro-nav__tab--active');
        if (active) {
            // Allow layout to settle before measuring
            requestAnimationFrame(() => {
                indicator.style.transition = 'none';
                moveIndicator(active);
                // Re-enable transition after first placement
                requestAnimationFrame(() => {
                    indicator.style.transition = '';
                });
            });
        }
    }

    /* Tab click handler */
    tabs.forEach(tab => {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            setActiveTab(this);
        });
    });

    /* ── Scroll: increase opacity ─────────────────────────── */
    function handleScroll() {
        if (!nav) return;
        if (window.scrollY > 20) {
            nav.classList.add('agro-nav--scrolled');
        } else {
            nav.classList.remove('agro-nav--scrolled');
        }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });

    /* ── Settings button: extra spin on click ─────────────── */
    const settingsBtn = document.getElementById('settingsBtn');
    if (settingsBtn) {
        settingsBtn.addEventListener('click', () => {
            settingsBtn.style.transition = 'transform 0.6s ease';
            settingsBtn.style.transform  = 'rotate(180deg)';
            setTimeout(() => {
                settingsBtn.style.transform = 'rotate(0deg)';
            }, 600);
        });
    }

    /* ── Hamburger / mobile menu ──────────────────────────── */
    const hamburger  = document.getElementById('navHamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileTabs = document.querySelectorAll('.agro-nav__mobile-tab');

    function closeMobileMenu() {
        if (!hamburger || !mobileMenu) return;
        hamburger.classList.remove('agro-nav__hamburger--open');
        hamburger.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.remove('agro-nav__mobile-menu--open');
        mobileMenu.setAttribute('aria-hidden', 'true');
    }

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', () => {
            const isOpen = hamburger.classList.toggle('agro-nav__hamburger--open');
            hamburger.setAttribute('aria-expanded', isOpen);
            mobileMenu.classList.toggle('agro-nav__mobile-menu--open', isOpen);
            mobileMenu.setAttribute('aria-hidden', !isOpen);
        });

        /* Sync active state between desktop & mobile tabs */
        mobileTabs.forEach(mTab => {
            mTab.addEventListener('click', function (e) {
                e.preventDefault();
                const tabId = this.dataset.tab;

                /* Update mobile active */
                mobileTabs.forEach(t => t.classList.remove('agro-nav__mobile-tab--active'));
                this.classList.add('agro-nav__mobile-tab--active');

                /* Mirror to desktop tabs */
                tabs.forEach(t => {
                    t.classList.toggle('agro-nav__tab--active', t.dataset.tab === tabId);
                });
                const activeDesktop = document.querySelector('.agro-nav__tab--active');
                if (activeDesktop) moveIndicator(activeDesktop);

                closeMobileMenu();
            });
        });

        /* Close on outside click */
        document.addEventListener('click', e => {
            if (nav && !nav.contains(e.target)) closeMobileMenu();
        });
    }

    /* Close mobile menu when resizing back to desktop */
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) closeMobileMenu();
        const active = document.querySelector('.agro-nav__tab--active');
        if (active) moveIndicator(active);
    });

    /* ── Init ─────────────────────────────────────────────── */
    initIndicator();

}());
