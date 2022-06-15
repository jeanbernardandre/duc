(function () {
    var currentTarget;
    document.querySelectorAll('.accordion > * > h3').forEach(function(e) {
        e.addEventListener('click', function () {
            if (currentTarget) {
                currentTarget.classList.remove('expanded');
            }
            currentTarget = this.parentNode;
            currentTarget.classList.add('expanded');
        });
    });
})();
