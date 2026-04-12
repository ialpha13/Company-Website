(function () {
    'use strict';

    const revealItems = document.querySelectorAll('[data-about-reveal]');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('.leaf').forEach((leaf, index) => {
        leaf.style.setProperty('--leaf-delay', (index * -0.7) + 's');
    });

    if (!revealItems.length) return;

    revealItems.forEach((item, index) => {
        item.style.setProperty('--about-reveal-delay', Math.min(index * 80, 420) + 'ms');
    });

    if (reduceMotion || !('IntersectionObserver' in window)) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, {
        rootMargin: '0px 0px -12% 0px',
        threshold: 0.16
    });

    revealItems.forEach((item) => revealObserver.observe(item));
}());
