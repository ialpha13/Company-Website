(function () {
    'use strict';

    const rows = document.querySelectorAll('[data-service-row]');
    if (!rows.length) return;
    const shell = document.querySelector('.services-stack__shell');

    function clearActiveRows() {
        rows.forEach((row) => {
            const toggle = row.querySelector('.service-row__toggle');
            row.classList.remove('is-active');
            if (toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    function setActiveRow(targetRow) {
        rows.forEach((row) => {
            const toggle = row.querySelector('.service-row__toggle');
            const isActive = row === targetRow;
            row.classList.toggle('is-active', isActive);
            if (toggle) {
                toggle.setAttribute('aria-expanded', isActive ? 'true' : 'false');
            }
        });
    }

    rows.forEach((row) => {
        const toggle = row.querySelector('.service-row__toggle');
        if (!toggle) return;

        row.addEventListener('mouseenter', function () {
            if (window.matchMedia('(hover: hover)').matches) {
                setActiveRow(row);
            }
        });

        toggle.addEventListener('click', function () {
            if (window.matchMedia('(hover: hover)').matches) {
                setActiveRow(row);
                return;
            }

            const isOpen = row.classList.contains('is-active');
            if (isOpen) {
                clearActiveRows();
            } else {
                setActiveRow(row);
            }
        });
    });

    if (shell) {
        shell.addEventListener('mouseleave', function () {
            if (window.matchMedia('(hover: hover)').matches) {
                clearActiveRows();
            }
        });
    }

    const orbitPills = document.querySelectorAll('.services-pill-float');
    orbitPills.forEach((pill, index) => {
        pill.style.animationDelay = '-' + (index * 2.4) + 's';
        const label = pill.querySelector('span');
        if (label) {
            label.style.animationDelay = '-' + (index * 2.4) + 's';
        }
    });
}());
