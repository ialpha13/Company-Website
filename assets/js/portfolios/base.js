(function () {
    'use strict';

    const cards = document.querySelectorAll('[data-service-media-card]');
    if (!cards.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.18 });

    cards.forEach((card, index) => {
        card.style.transitionDelay = (index * 80) + 'ms';
        observer.observe(card);
    });
}());
