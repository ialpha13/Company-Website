(function () {
    'use strict';

    const posts = document.querySelectorAll('[data-reveal-card]');
    if (!posts.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.15 });

    posts.forEach((post, index) => {
        post.style.transitionDelay = (index * 70) + 'ms';
        observer.observe(post);
    });
}());
