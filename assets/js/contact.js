(function () {
    'use strict';

    const revealItems = document.querySelectorAll('[data-reveal-card]');
    const tiltCards = document.querySelectorAll('[data-tilt-card]');
    const faqItems = document.querySelectorAll('[data-faq-item]');
    const reasonButtons = document.querySelectorAll('.contact-reasons button');
    const spotlightCards = document.querySelectorAll('.contact-method, .contact-card, .contact-advisor, .contact-location, .contact-community');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const canHover = window.matchMedia('(hover: hover)').matches;

    const updateProgress = () => {
        const scrollable = document.documentElement.scrollHeight - window.innerHeight;
        const progress = scrollable > 0 ? window.scrollY / scrollable : 0;
        document.body.style.setProperty('--contact-progress', Math.min(Math.max(progress, 0), 1).toFixed(4));
    };

    updateProgress();
    window.addEventListener('scroll', updateProgress, { passive: true });
    window.addEventListener('resize', updateProgress);

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

    reasonButtons.forEach((button, index) => {
        button.setAttribute('aria-pressed', index === 0 ? 'true' : 'false');
        if (index === 0) button.classList.add('is-active');

        button.addEventListener('click', () => {
            reasonButtons.forEach((item) => {
                item.classList.remove('is-active');
                item.setAttribute('aria-pressed', 'false');
            });

            button.classList.add('is-active');
            button.setAttribute('aria-pressed', 'true');
        });
    });

    if (reduceMotion || !canHover) return;

    document.body.classList.add('has-contact-pointer');

    let pointerFrame = 0;
    window.addEventListener('pointermove', (event) => {
        if (pointerFrame) return;

        pointerFrame = window.requestAnimationFrame(() => {
            document.body.style.setProperty('--contact-glow-x', event.clientX + 'px');
            document.body.style.setProperty('--contact-glow-y', event.clientY + 'px');
            pointerFrame = 0;
        });
    }, { passive: true });

    spotlightCards.forEach((card) => {
        card.addEventListener('pointermove', (event) => {
            const rect = card.getBoundingClientRect();
            const x = ((event.clientX - rect.left) / rect.width) * 100;
            const y = ((event.clientY - rect.top) / rect.height) * 100;
            card.style.setProperty('--card-x', x.toFixed(2) + '%');
            card.style.setProperty('--card-y', y.toFixed(2) + '%');
        });
    });

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
