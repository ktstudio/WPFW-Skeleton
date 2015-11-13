// Windows 8 mobile Responsive utility
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style')
    msViewportStyle.appendChild(
            document.createTextNode(
                    '@-ms-viewport{width:auto!important}'
                    )
            )
    document.querySelector('head').appendChild(msViewportStyle)
}

// Jquery functions
jQuery(document).ready(function () {
    // LazyLoading
    jQuery("img").unveil(500, function () {
        jQuery(this).load(function () {
            this.style.opacity = 0;
            jQuery(this).animate({opacity: 1});
        });
    });

    // Popup okno pro fotky
    jQuery('.fbx-link').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }

    });

    // Popup WP gallery
    jQuery('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Nahrávám #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: 0
        },
        image: {
            tError: '<a href="%url%">Obrázek #%curr%</a> nelze načíst.',
            titleSrc: function (item) {
                return item.el.attr('title');
            }
        }
    });

    // Popojetí na kotvu z hlášky u Notices projektu
    jQuery("span[data-target]").click(function () {
        var targetElement = jQuery(jQuery(this).data("target"));
        jQuery('html, body').animate({
            scrollTop: targetElement.offset().top
        }, 1000);

        return this;
    });

    // Odeslání formu přes JS
    jQuery("#submitButton, .submitButton").click(function () {
        jQuery(this).parents("form").submit();
    });

    // Potvrzení s využíváním cookies
    jQuery("#ktCookieStatementConfirm").click(function () {
        var date = new Date();
        date.setFullYear(date.getFullYear() + 10);
        document.cookie = "kt-cookie-statement-key=1; path=/; expires=" + date.toGMTString();
        jQuery("#ktCookieStatement").fadeOut();
    });
    
});