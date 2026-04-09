document.addEventListener('DOMContentLoaded', function () {
    var footer = document.querySelector('.site-footer');
    if (!footer) return;

    footer.setAttribute('data-ready', 'true');
});
