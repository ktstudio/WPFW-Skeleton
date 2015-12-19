<?php

$config = new KT_WP_Configurator();

$config->setDisplayLogo()
        ->setPostArchiveMenu()
        ->setAllowCookieStatement();

$config->addThemeSupport(KT_WP_THEME_SUPPORT_POST_THUMBNAILS_KEY);

$config->addPostTypeSupport(KT_WP_POST_TYPE_SUPPORT_EXCERPT_KEY, array(KT_WP_PAGE_KEY));

$config->removePostTypeSupport(KT_WP_POST_TYPE_SUPPORT_THUMBNAIL_KEY, array(KT_WP_PAGE_KEY));

$config->setExcerptText("...");

$config->pageRemover()
        ->removeComments()
        ->removeTools()
        ->removeSubPage("edit.php", "edit-tags.php")
        ->removeSubPage("edit.php", "edit-tags.php?taxonomy=post_tag")
        ->removeSubPage("themes.php", "theme-editor.php");

$config->metaboxRemover()
        ->removePostTagMetabox()
        ->removeMetabox("tagsdiv-news-type", KT_WP_POST_KEY, "normal")
        ->removeRevisionsMetabox();

// --- images ------------------------------

$config->addImageSize(KT_ZZZ_IMAGE_SIZE_SLIDER, 1200, 250, true);
$config->addImageSize(KT_ZZZ_IMAGE_SIZE_REFERENCE_GALLERY, 768, 480, true);

$config->setImagesLazyLoading(true);

// --- styly ---------------------------

$config->assetsConfigurator()->addStyle(KT_MAGNIFIC_POPUP_STYLE)->setEnqueue();
//$config->assetsConfigurator()->addStyle("kt-zzz-bootstrap-style", KT_ZZZ_CSS_URL . "/bootstrap.min.css")->setEnqueue();
/*
 * Bylo by dobré používat pouze jeden styl, spojený a minifikovaný do jednoho souboru, 
 * pak předchozí registrace nejsou třeba a stačí pouze následující:
 */
$config->assetsConfigurator()->addStyle("kt-zzz-style", get_template_directory_uri() . "/style.css")
        ->setDeps(array(KT_MAGNIFIC_POPUP_STYLE)) //, "kt-zzz-bootstrap-style"))
        ->setEnqueue();

$config->assetsConfigurator()->addStyle("kt-zzz-font-open-sans", "http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700,800&amp;subset=latin,latin-ext")->setEnqueue();

// --- scripty ------------------------------

$config->assetsConfigurator()
        ->addScript(KT_JQUERY_UNVEIL_SCRIPT)
        ->setInFooter(true)
        ->setEnqueue();
$config->assetsConfigurator()
        ->addScript(KT_MAGNIFIC_POPUP_SCRIPT)
        ->setInFooter(true)
        ->setEnqueue();
//$config->assetsConfigurator()
//        ->addScript("kt-zzz-bootstrap-script", KT_ZZZ_JS_URL . "/bootstrap.min.js")
//        ->setInFooter(true)
//        ->setEnqueue();
/*
 * Bylo by dobré používat pouze jeden skript, spojený a minifikovaný do jednoho souboru, 
 * pak předchozí registrace nejsou třeba a stačí pouze následující:
 */
$config->assetsConfigurator()
        ->addScript("kt-zzz-functions-script", KT_ZZZ_JS_URL . "/kt-zzz-functions.min.js")
        ->setDeps(array(KT_JQUERY_UNVEIL_SCRIPT, KT_MAGNIFIC_POPUP_SCRIPT)) //, "kt-zzz-bootstrap-script"))
        ->addLocalizationData("myAjax", array("ajaxurl" => admin_url("admin-ajax.php")))
        ->setInFooter(true)
        ->setEnqueue();

// --- menu ---------------------------

$config->addWpMenu(KT_ZZZ_NAVIGATION_MAIN_MENU, __("Menu v hlavičce", ZZZ_DOMAIN));

// --- sidebars ------------------------------

$config->addSidebar(KT_ZZZ_SIDEBAR_DEFAULT)
        ->setName(__("Default", ZZZ_DOMAIN))
        ->setDescription(__("Výchozí", ZZZ_DOMAIN))
        ->setBeforeWidget('<div id="%1$s" class="widget %2$s">')
        ->setAfterWidget("</div>");

// --- dashboard ------------------------------

$config->metaboxRemover()->clearWordpressDashboard(true)
        ->removeDashboardMetabox("icl_dashboard_widget")
        ->removeDashboardMetabox("wpseo-dashboard-overview");

// --- widgety ------------------------------

$config->widgetRemover()->removeAllSystemWidgets(true)
        ->removeWidget("bcn_widget");

// --- head ------------------------------

$config->headRemover()->removeRecommendSystemHeads();

// --- incializace ------------------------------

$config->initialize();

// --- umístění jQuery pluginu do patičky ------------------------------

add_action("wp_enqueue_scripts", "kt_zzz_enqueue_jquery_in_footer");

function kt_zzz_enqueue_jquery_in_footer() {
    wp_deregister_script(KT_WP_JQUERY_SCRIPT);
    /*
     * V případě, že máte všechny skripty spojené do jednoho včetně (vlastní) jQuery, 
     * tak následující 2 řádky zakomentujte, WP jQuery už pak není třeba:
     */
    wp_register_script(KT_WP_JQUERY_SCRIPT, "/wp-includes/js/jquery/jquery.js", false, "", true);
    wp_enqueue_script(KT_WP_JQUERY_SCRIPT);
}
