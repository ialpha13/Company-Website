(function () {
    'use strict';

    const sections = document.querySelectorAll('.blog-article-section, .blog-article-panel, .blog-article-intro, .blog-article-highlight, .blog-article-closing, .blog-related-card');
    if (!sections.length) return;

    if (!('IntersectionObserver' in window)) {
        sections.forEach((section) => {
            section.classList.add('is-visible');
        });
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.12 });

    sections.forEach((section, index) => {
        section.style.transitionDelay = Math.min(index * 70, 240) + 'ms';
        observer.observe(section);
    });

    document.addEventListener('transitionend', function (event) {
        if (!event.target.classList.contains('is-visible')) return;
        event.target.style.transform = '';
    });
}());
