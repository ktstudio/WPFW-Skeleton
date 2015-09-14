jQuery(document).ready(function () {
    // Lazy loading obrázků
    jQuery("img").unveil(500, function () {
        jQuery(this).load(function () {
            this.style.opacity = 0;
            jQuery(this).animate({opacity: 1});
        });
    });
});