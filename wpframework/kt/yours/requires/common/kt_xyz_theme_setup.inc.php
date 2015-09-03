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

// --- images --------------------------

//$config->addImageSize(KT_XYZ_IMAGE_SIZE_CUSTOM_THUMB, 123, 456, true);

$config->setImagesLazyLoading(true);

// --- styly ---------------------------

$config->assetsConfigurator()->addStyle("kt-xyz-style", get_template_directory_uri() . "/style.css")->setEnqueue();

// --- scripty ---------------------------

//$config->assetsConfigurator()
//        ->addScript("kt-xyz-functions-script", KT_XYZ_JS_URL . "/kt-xyz-functions.min.js")
//        ->addLocalizationData("myAjax", array("ajaxurl" => admin_url("admin-ajax.php")))
//        ->setInFooter(true)
//        ->setEnqueue();

// --- menu ---------------------------

$config->addWpMenu(KT_XYZ_NAVIGATION_MAIN_MENU, __("Menu v hlavičce", XYZ_DOMAIN));

// --- sidebars ---------------------------

$config->addSidebar(KT_XYZ_SIDEBAR_DEFAULT)
        ->setName(__("Default", XYZ_DOMAIN))
        ->setDescription(__("Výchozí", XYZ_DOMAIN))
        ->setBeforeWidget('<div id="%1$s" class="widget %2$s">')
        ->setAfterWidget("</div>");

// --- dashboard ---------------------------

$config->metaboxRemover()->clearWordpressDashboard(true);

// --- widgety ---------------------------

$config->widgetRemover()->removeAllSystemWidgets(true)
        ->removeWidget("bcn_widget");

// --- incializace ---------------------------

$config->initialize();

// --- umístění jQuery pluginu do patičky ------------------

add_action("wp_enqueue_scripts", "kt_enqueue_jquery_in_footer");

function kt_enqueue_jquery_in_footer() {
    wp_register_script(KT_WP_JQUERY_SCRIPT, "/wp-includes/js/jquery/jquery.js", false, "", true);
    wp_enqueue_script(KT_WP_JQUERY_SCRIPT);
}

// --- smajlíci ------------------

remove_action("wp_head", "print_emoji_detection_script", 7);
remove_action("wp_print_styles", "print_emoji_styles");
