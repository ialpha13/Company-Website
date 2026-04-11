(function () {
    'use strict';

    var panels = Array.prototype.slice.call(document.querySelectorAll('[data-portfolio-panel]'));
    var reducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var isAnimating = false;
    var wheelLockUntil = 0;
    var touchStartY = null;
    var touchActive = false;
    var root = document.documentElement;

    if (!panels.length) {
        return;
    }

    var lastPanel = panels[panels.length - 1];

    var getActiveIndex = function () {
        var activeIndex = 0;
        var bestDistance = Number.POSITIVE_INFINITY;

        panels.forEach(function (panel, index) {
            var rect = panel.getBoundingClientRect();
            var distance = Math.abs(rect.top);
            if (distance < bestDistance) {
                bestDistance = distance;
                activeIndex = index;
            }
        });

        return activeIndex;
    };

    var scrollToPanel = function (index) {
        if (index < 0 || index >= panels.length) {
            return;
        }

        isAnimating = true;
        wheelLockUntil = Date.now() + 850;

        panels[index].scrollIntoView({
            behavior: reducedMotion ? 'auto' : 'smooth',
            block: 'start'
        });

        window.setTimeout(function () {
            isAnimating = false;
        }, reducedMotion ? 80 : 820);
    };

    var moveToAdjacentPanel = function (direction) {
        var activeIndex = getActiveIndex();
        var targetIndex = direction > 0 ? activeIndex + 1 : activeIndex - 1;

        if (targetIndex === activeIndex || targetIndex < 0 || targetIndex >= panels.length) {
            return false;
        }

        scrollToPanel(targetIndex);
        return true;
    };

    var updateScrollMode = function () {
        if (!lastPanel) {
            return;
        }

        var rect = lastPanel.getBoundingClientRect();
        var threshold = window.innerHeight * 0.18;
        var shouldFreeScroll = rect.top <= threshold;

        root.classList.toggle('portfolio-free-scroll', shouldFreeScroll);
    };

    var handleWheel = function (event) {
        if (reducedMotion) {
            return;
        }

        if (Math.abs(event.deltaY) < 18) {
            return;
        }

        updateScrollMode();

        if (isAnimating || Date.now() < wheelLockUntil) {
            event.preventDefault();
            return;
        }

        if (root.classList.contains('portfolio-free-scroll') && event.deltaY > 0) {
            return;
        }

        if (!moveToAdjacentPanel(event.deltaY > 0 ? 1 : -1)) {
            return;
        }

        event.preventDefault();
    };

    var handleTouchStart = function (event) {
        if (reducedMotion || !event.touches || !event.touches.length) {
            return;
        }

        touchStartY = event.touches[0].clientY;
        touchActive = true;
    };

    var handleTouchMove = function (event) {
        if (!touchActive || touchStartY === null || reducedMotion || isAnimating || Date.now() < wheelLockUntil) {
            return;
        }

        if (!event.touches || !event.touches.length) {
            return;
        }

        var currentY = event.touches[0].clientY;
        var deltaY = touchStartY - currentY;

        if (Math.abs(deltaY) < 50) {
            return;
        }

        updateScrollMode();

        if (root.classList.contains('portfolio-free-scroll') && deltaY > 0) {
            touchActive = false;
            touchStartY = null;
            return;
        }

        if (moveToAdjacentPanel(deltaY > 0 ? 1 : -1)) {
            event.preventDefault();
        }

        touchActive = false;
        touchStartY = null;
    };

    var handleTouchEnd = function () {
        touchActive = false;
        touchStartY = null;
    };

    var handleKeydown = function (event) {
        if (reducedMotion || isAnimating || Date.now() < wheelLockUntil) {
            return;
        }

        updateScrollMode();

        if (event.key === 'ArrowDown' || event.key === 'PageDown') {
            if (root.classList.contains('portfolio-free-scroll')) {
                return;
            }

            if (moveToAdjacentPanel(1)) {
                event.preventDefault();
            }
        }

        if (event.key === 'ArrowUp' || event.key === 'PageUp') {
            if (moveToAdjacentPanel(-1)) {
                event.preventDefault();
            }
        }
    };

    window.addEventListener('scroll', updateScrollMode, { passive: true });
    window.addEventListener('resize', updateScrollMode);

    window.addEventListener('wheel', handleWheel, { passive: false });
    window.addEventListener('touchstart', handleTouchStart, { passive: true });
    window.addEventListener('touchmove', handleTouchMove, { passive: false });
    window.addEventListener('touchend', handleTouchEnd, { passive: true });
    window.addEventListener('touchcancel', handleTouchEnd, { passive: true });
    window.addEventListener('keydown', handleKeydown);

    updateScrollMode();
}());
