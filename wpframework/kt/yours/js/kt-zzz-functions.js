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
    jQuery('.fbx-link, .kt-img-link').magnificPopup({
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
    jQuery("[data-kt-target]").click(function () {
        var targetElement = jQuery(jQuery(this).data("kt-target"));
        var targetBottomOffset = jQuery(this).data("kt-bottom-offset");
        var targetTopOffset = jQuery(this).data("kt-top-offset");

        moveToHtmlTarget(targetElement, targetTopOffset, targetBottomOffset);
    });

    // Odeslání formu přes JS
    jQuery("#submitButton, .submitButton").click(function(){
        if(jQuery(this).hasClass("disabled")){
            return false;
        }
        
        jQuery(this).parents("form").submit();
    });

    // Dodá všem iframe elmentům responsivní vlastnost v rámci entryContent (wysiwyg editor)
    jQuery(".entry-content iframe").each(function(){
        jQuery(this).addClass("embed-responsive-item").wrap("<div class=\"embed-responsive embed-responsive-16by9\"></div>");
        jQuery(this).removeAttr("width");
        jQuery(this).removeAttr("height");
    });

    // Dodá všem table elmentům responsivní vlastnost v rámci entryContent (wysiwyg editor)
    jQuery(".entry-content table").each(function(){
        jQuery(this).addClass("table").wrap("<div class=\"table-responsive\"></div>");
    });
    
    // cookie statement
    var ktCookieStatementContainer = jQuery("#ktCookieStatementContainer");
    if (ktCookieStatementContainer && ktCookieStatementContainer.length > 0) {
        // Výpis cookie statementu
        if (!checkCookieRecord("kt-cookie-statement-key")) {
            data = {action: "kt_load_cookie_statement_content"};
            jQuery.post(myAjax.ajaxurl, data, function (response) {
                if (response) {
                    ktCookieStatementContainer.html(response);
                }
            });
        }
        // Potvrzení s využíváním cookies
        jQuery(document).on("click", "#ktCookieStatementConfirm", function () {
            setCookieRecord("kt-cookie-statement-key", 1, 10);
            jQuery("#ktCookieStatement").fadeOut();
        });
    }
    
    jQuery("#load-more-posts").click(function () {
        var input = jQuery("#load-more-posts");
        var container = jQuery("#posts-container");
        var offset = container.data("offset");
        if (offset < 0) {
            return;
        }

        input.addClass("loadingUpper");
        container.addClass("loading");

        data = {
            action: "kt_zzz_load_more_posts",
            kt_offset: offset,
            kt_category_id: container.data("category-id"),
        };

        jQuery.post(myAjax.ajaxurl, data, function (response) {
            if (response == null || response == false) { // empty
                input.css("display", "none");
            } else if (response.indexOf("<p") == 0) { // no results
                input.css("display", "none");
                container.html(response);
            } else { // data
                container.html(container.html() + response);
                var count = jQuery("#posts-container article").length;
                container.data("offset", count);
                if (count < 10 || (count - offset) < 10) {
                    input.css("display", "none");
                }
            }
            input.removeClass("loadingUpper");
            container.removeClass("loading");
        });
    });
});

// Nastaví cookie hodnotu dle klíče po zadanou dobu (pro celou cestu /)
function setCookieRecord(cookieName, cookieValue, expirationDaysCount) {
    var date = new Date();
    date.setFullYear(date.getFullYear() + expirationDaysCount);
    document.cookie = cookieName + "=" + cookieValue + "; path=/; expires=" + date.toUTCString();
}

// Smaže cookie hodnotu dle klíče po zadanou dobu (pro celou cestu /)
function removeCookieRecord(cookieName) {
    var date = new Date();
    date.setFullYear(date.getFullYear() - 1);
    document.cookie = cookieName + "=\"\"; path=/; expires=" + date.toUTCString();
}

// Vrátí hodnotu cookie dle klíče
function getCookieRecord(cookieName) {
    var name = cookieName + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookieValue = cookies[i];
        while (cookieValue.charAt(0) == ' ') {
            cookieValue = cookieValue.substring(1);
        }
        if (cookieValue.indexOf(name) == 0) {
            return cookieValue.substring(name.length, cookieValue.length);
        }
    }
    return "";
}

// Zkontroluje, zda existuje cookie (hodnota dle klíče)
function checkCookieRecord(cookieName) {
    var cookieValue = getCookieRecord(cookieName);
    if (cookieValue != "") {
        return true;
    }
    return false;
}

// Odstraní z URL parametr a jeho hodnotu
function removeUrlParameter(parameter)
{
    var url = document.location.href;
    var urlParts = url.split("?");
    if (urlParts.length >= 2)
    {
        var urlBase = urlParts.shift();
        var queryString = urlParts.join("?");
        var prefix = encodeURIComponent(parameter) + "=";
        var parts = queryString.split(/[&;]/g);
        for (var i = parts.length; i-- > 0; ) {
            if (parts[i].lastIndexOf(prefix, 0) !== -1)
            {
                parts.splice(i, 1);
            }
        }
        url = urlBase + "?" + parts.join("&");
        window.history.pushState("", document.title, url);
    }
    return url;
}

// Funkce pro animované posunutí na prvek v DOM dokumentu
function moveToHtmlTarget(elemnt, topOffset, bottomOffset){

    var offset = elemnt.offset().top;

    if (topOffset > 0) {
        offset = offset - topOffset;
    }

    if (bottomOffset > 0) {
        offset = offset + bottomOffset;
    }

    jQuery('html, body').animate({
        scrollTop: offset
    }, 1000);

    return this;
}

// Vlastní volání funkcí (pro šablonu)

removeUrlParameter("contact-processed");