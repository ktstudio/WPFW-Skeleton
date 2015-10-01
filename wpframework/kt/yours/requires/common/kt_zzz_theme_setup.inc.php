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

//$config->addImageSize(KT_ZZZ_IMAGE_SIZE_CUSTOM_THUMB, 123, 456, true);

$config->setImagesLazyLoading(true);

// --- styly ---------------------------

$config->assetsConfigurator()->addStyle("kt-zzz-style", get_template_directory_uri() . "/style.css")->setEnqueue();

// --- scripty ---------------------------

$config->assetsConfigurator()
        ->addScript(KT_JQUERY_UNVEIL_SCRIPT)
        ->setInFooter(true)
        ->setEnqueue();

$config->assetsConfigurator()
        ->addScript("kt-zzz-functions-script", KT_ZZZ_JS_URL . "/kt-zzz-functions.min.js")
        ->addLocalizationData("myAjax", array("ajaxurl" => admin_url("admin-ajax.php")))
        ->setInFooter(true)
        ->setEnqueue();

// --- menu ---------------------------

$config->addWpMenu(KT_ZZZ_NAVIGATION_MAIN_MENU, __("Menu v hlavičce", ZZZ_DOMAIN));

// --- sidebars ---------------------------

$config->addSidebar(KT_ZZZ_SIDEBAR_DEFAULT)
        ->setName(__("Default", ZZZ_DOMAIN))
        ->setDescription(__("Výchozí", ZZZ_DOMAIN))
        ->setBeforeWidget('<div id="%1$s" class="widget %2$s">')
        ->setAfterWidget("</div>");

// --- dashboard ---------------------------

$config->metaboxRemover()->clearWordpressDashboard(true);

// --- widgety ---------------------------

$config->widgetRemover()->removeAllSystemWidgets(true)
        ->removeWidget("bcn_widget");

// --- head ---------------------------

$config->headRemover()->removeRecommendSystemHeads();

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
