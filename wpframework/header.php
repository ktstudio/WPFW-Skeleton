<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="author" content="KTStudio.cz">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title("|", true, "right"); ?></title>
        <link rel="icon" type="image/ico" href="<?php echo KT::imageGetUrlFromTheme("favicon.ico"); ?>">
        <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>" />
        <?php wp_head(); ?>
        <!--[if lt IE 9]>
            <script src="<?php echo KT_ZZZ_JS_URL; ?>/compatibility.js"></script>  
        <![endif]-->
    </head>
    <body>

        <header id="header" class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only"><?php _e("Menu", ZZZ_DOMAIN); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo get_home_url(); ?>" title="<?php _e("WP Framework", ZZZ_DOMAIN); ?>" class="navbar-brand"><?php _e("WP Framework", ZZZ_DOMAIN); ?></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php KT::theWpNavMenu(KT_ZZZ_NAVIGATION_MAIN_MENU, 1); ?>
                        </ul>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </nav>
        </header>

        <?php get_template_part("partials/breadcrumb"); ?>

        <div id="projectNotices" class="container">
            <?php do_action(KT_PROJECT_NOTICES_ACTION); ?>
        </div>
