(function () {
    'use strict';

    const cards = document.querySelectorAll('[data-reveal-card]');
    if (!cards.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.15 });

    cards.forEach((card, index) => {
        card.style.transitionDelay = (index * 70) + 'ms';
        observer.observe(card);
    });
}());
