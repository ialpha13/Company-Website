(function () {
    'use strict';

    const revealCards = document.querySelectorAll('[data-reveal-card]');
    const counterNodes = document.querySelectorAll('[data-count]');
    const tiltCards = document.querySelectorAll('[data-tilt-card]');
    const aboutHero = document.querySelector('.about-hero__media');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if ('IntersectionObserver' in window && revealCards.length) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.15 });

        revealCards.forEach((card, index) => {
            card.style.transitionDelay = Math.min(index * 70, 280) + 'ms';
            revealObserver.observe(card);
        });
    } else {
        revealCards.forEach((card) => card.classList.add('is-visible'));
    }

    if ('IntersectionObserver' in window && counterNodes.length) {
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                const node = entry.target;
                const target = Number(node.dataset.count || 0);
                const suffix = target === 100 ? '%' : '+';
                const duration = 1100;
                const start = performance.now();

                const tick = (time) => {
                    const progress = Math.min((time - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    node.textContent = Math.round(target * eased) + suffix;
                    if (progress < 1) {
                        requestAnimationFrame(tick);
                    }
                };

                requestAnimationFrame(tick);
                observer.unobserve(node);
            });
        }, { threshold: 0.4 });

        counterNodes.forEach((node) => counterObserver.observe(node));
    } else {
        counterNodes.forEach((node) => {
            const target = Number(node.dataset.count || 0);
            node.textContent = target + (target === 100 ? '%' : '+');
        });
    }

    if (reduceMotion || !window.matchMedia('(hover: hover)').matches) return;

    if (aboutHero) {
        aboutHero.addEventListener('mousemove', (event) => {
            const rect = aboutHero.getBoundingClientRect();
            const offsetX = (event.clientX - rect.left) / rect.width - 0.5;
            const offsetY = (event.clientY - rect.top) / rect.height - 0.5;

            aboutHero.style.setProperty('--about-tilt-x', (offsetY * -5).toFixed(2) + 'deg');
            aboutHero.style.setProperty('--about-tilt-y', (offsetX * 8).toFixed(2) + 'deg');
        });

        aboutHero.addEventListener('mouseleave', () => {
            aboutHero.style.removeProperty('--about-tilt-x');
            aboutHero.style.removeProperty('--about-tilt-y');
        });
    }

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
