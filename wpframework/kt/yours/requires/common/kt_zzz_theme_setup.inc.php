<?php

$config = new KT_WP_Configurator();

$config->setDisplayLogo()
    ->setPostArchiveMenu()
    ->setAllowCookieStatement()
    ->setAllowSession();

$config->addThemeSupport(KT_WP_THEME_SUPPORT_POST_THUMBNAILS_KEY);

$config->addPostTypeSupport(KT_WP_POST_TYPE_SUPPORT_EXCERPT_KEY, [KT_WP_PAGE_KEY]);

$config->setExcerptText("...");

$config->pageRemover()
    ->removeComments()
    ->removeSubPage("themes.php", "theme-editor.php");

$config->metaboxRemover()
    ->removePostTagMetabox()
    ->removeMetabox("tagsdiv-news-type", KT_WP_POST_KEY, "normal")
    ->removeRevisionsMetabox();

// --- images ------------------------------

$config->setImagesLazyLoading(true)
    ->setImagesLinkClasses(true);

// --- styly ---------------------------

$config->assetsConfigurator()->addStyle("kt-zzz-style", get_template_directory_uri() . "/style.css")
    ->setVersion(20190110)
    ->setEnqueue();

$config->assetsConfigurator()
    ->addStyle("kt-zzz-font-open-sans", "https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&amp;subset=latin-ext")
    ->setEnqueue();

// --- scripty ------------------------------

$config->assetsConfigurator()
    ->addScript("kt-bt-functions-script", KT_ZZZ_JS_URL . "/kt-functions.min.js")
    ->addLocalizationData("myAjax", ["ajaxurl" => admin_url("admin-ajax.php")])
    ->setInFooter(true)
    ->setVersion(20190110)
    ->setEnqueue();

// --- menu ---------------------------

$config->addWpMenu(KT_ZZZ_NAVIGATION_MAIN_MENU, __("Menu v hlavičce", "ZZZ_DOMAIN"));

// --- sidebars ------------------------------

$config->addSidebar(KT_ZZZ_SIDEBAR_DEFAULT)
    ->setName(__("Default", "ZZZ_DOMAIN"))
    ->setDescription(__("Výchozí", "ZZZ_DOMAIN"))
    ->setBeforeWidget('<div id="%1$s" class="widget %2$s">')
    ->setAfterWidget("</div>");

// --- dashboard ------------------------------

$config->metaboxRemover()->clearWordpressDashboard(true)
    ->removeDashboardMetabox("icl_dashboard_widget")
    ->removeDashboardMetabox("wpseo-dashboard-overview");

// --- widgety ------------------------------

$config->widgetRemover()
    ->removeAllSystemWidgets(true, true)
    ->removeWidget("bcn_widget");

// --- head ------------------------------

$config->headRemover()->removeRecommendSystemHeads();

// --- Stránka s theme options ------------------------------

$config->setThemeSettingsPage();

// --- incializace ------------------------------

$config->initialize();