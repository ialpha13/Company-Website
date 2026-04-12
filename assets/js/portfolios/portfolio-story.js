(function () {
    'use strict';

    const revealItems = document.querySelectorAll('[data-story-reveal]');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    revealItems.forEach((item, index) => {
        item.style.setProperty('--story-delay', Math.min(index * 70, 350) + 'ms');
    });

    if (!revealItems.length) return;

    if (reduceMotion || !('IntersectionObserver' in window)) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries, instance) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            instance.unobserve(entry.target);
        });
    }, { threshold: 0.16, rootMargin: '0px 0px -10% 0px' });

    revealItems.forEach((item) => observer.observe(item));
}());
