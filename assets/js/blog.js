(function () {
    'use strict';

    const cards = document.querySelectorAll('[data-blog-card], [data-featured-card]');
    const heroVisual = document.querySelector('[data-blog-hero-visual]');
    const heroCards = document.querySelectorAll('[data-blog-hero-card]');
    const searchInput = document.querySelector('[data-blog-search-input]');
    const clearButton = document.querySelector('[data-blog-search-clear]');
    const status = document.querySelector('[data-blog-search-status]');
    const emptyState = document.querySelector('[data-blog-search-empty]');
    const filterButtons = document.querySelectorAll('[data-blog-filter]');

    if (!cards.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.15 });

    cards.forEach((card, index) => {
        card.style.transitionDelay = Math.min(index * 60, 220) + 'ms';
        observer.observe(card);
    });

    if (heroVisual && heroCards.length && !window.matchMedia('(hover: none)').matches) {
        const updateHeroCards = (clientX, clientY) => {
            const rect = heroVisual.getBoundingClientRect();
            const offsetX = ((clientX - rect.left) / rect.width) - 0.5;
            const offsetY = ((clientY - rect.top) / rect.height) - 0.5;

            heroCards.forEach((card, index) => {
                const depth = index === 0 ? 18 : (index === 1 ? 12 : 10);
                card.style.setProperty('--mx', (offsetX * depth).toFixed(2) + 'px');
                card.style.setProperty('--my', (offsetY * depth).toFixed(2) + 'px');
            });
        };

        heroVisual.addEventListener('mousemove', function (event) {
            updateHeroCards(event.clientX, event.clientY);
        });

        heroVisual.addEventListener('mouseleave', function () {
            heroCards.forEach((card) => {
                card.style.setProperty('--mx', '0px');
                card.style.setProperty('--my', '0px');
            });
        });
    }

    if (!searchInput) return;

    let activeCategory = 'all';

    const updateSearch = () => {
        const query = searchInput.value.trim().toLowerCase();
        let visibleCount = 0;

        document.querySelectorAll('[data-blog-card]').forEach((card) => {
            const haystack = card.dataset.searchText || '';
            const category = (card.dataset.category || '').toLowerCase();
            const matchesQuery = query === '' || haystack.includes(query);
            const matchesCategory = activeCategory === 'all' || category === activeCategory;
            const matches = matchesQuery && matchesCategory;
            card.hidden = !matches;
            if (matches) {
                visibleCount += 1;
            }
        });

        if (status) {
            const base = 'Showing ' + visibleCount + ' article' + (visibleCount === 1 ? '' : 's');
            const categoryLabel = activeCategory === 'all'
                ? ''
                : ' in ' + activeCategory.replace(/\b\w/g, function (char) { return char.toUpperCase(); });
            const queryLabel = query === ''
                ? ''
                : ' for "' + query + '"';

            status.textContent = (query === '' && activeCategory === 'all')
                ? 'Showing all articles'
                : base + categoryLabel + queryLabel;
        }

        if (emptyState) {
            emptyState.hidden = visibleCount !== 0;
        }

        if (clearButton) {
            clearButton.hidden = query === '';
        }
    };

    searchInput.addEventListener('input', updateSearch);

    filterButtons.forEach((button) => {
        button.addEventListener('click', function () {
            activeCategory = button.dataset.blogFilter || 'all';

            filterButtons.forEach((item) => {
                item.classList.toggle('is-active', item === button);
            });

            updateSearch();
        });
    });

    if (clearButton) {
        clearButton.hidden = true;
        clearButton.addEventListener('click', function () {
            searchInput.value = '';
            searchInput.focus();
            updateSearch();
        });
    }

    updateSearch();
}());
