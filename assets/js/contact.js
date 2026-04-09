(function () {
    'use strict';

    const revealItems = document.querySelectorAll('[data-reveal-card]');
    const tiltCards = document.querySelectorAll('[data-tilt-card]');
    const faqItems = document.querySelectorAll('[data-faq-item]');

    if ('IntersectionObserver' in window && revealItems.length) {
        const observer = new IntersectionObserver((entries, currentObserver) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                currentObserver.unobserve(entry.target);
            });
        }, { threshold: 0.15 });

        revealItems.forEach((item, index) => {
            item.style.transitionDelay = Math.min(index * 70, 280) + 'ms';
            observer.observe(item);
        });
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    faqItems.forEach((item) => {
        const button = item.querySelector('[data-faq-toggle]');
        const content = item.querySelector('[data-faq-content]');
        if (!button || !content) return;

        button.addEventListener('click', () => {
            const isOpen = item.classList.toggle('is-open');
            button.setAttribute('aria-expanded', String(isOpen));
            content.hidden = !isOpen;
        });
    });

    if (!window.matchMedia('(hover: hover)').matches) return;

    tiltCards.forEach((card) => {
        card.addEventListener('mousemove', (event) => {
            const rect = card.getBoundingClientRect();
            const offsetX = (event.clientX - rect.left) / rect.width;
            const offsetY = (event.clientY - rect.top) / rect.height;
            const rotateY = (offsetX - 0.5) * 8;
            const rotateX = (0.5 - offsetY) * 8;

            card.style.transform = 'perspective(1000px) rotateX(' + rotateX.toFixed(2) + 'deg) rotateY(' + rotateY.toFixed(2) + 'deg) translateY(-4px)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });
}());
