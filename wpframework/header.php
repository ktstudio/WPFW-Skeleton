<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="author" content="www.brilo.cz">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title("|", true, "right"); ?></title>
        <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>" />
        <?php wp_head(); ?>
        <!--[if lt IE 9]>
            <script src="<?php echo KT_XYZ_JS_URL; ?>/compatibility.js"></script>  
        <![endif]-->
    </head>
    <body>

        <header id="header" class="container">
            <a href="<?php echo get_home_url(); ?>" title="<?php _e("WP Framework", XYZ_DOMAIN) ?>">
                <?php _e("WP Framework", XYZ_DOMAIN) ?>
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav"><span><?php _e("Menu", XYZ_DOMAIN) ?></span></button>
            <nav>
                <ul id="mainNav" class="navbar-collapse collapse clearfix">
                    <?php KT::theWpNavMenu(KT_XYZ_NAVIGATION_MAIN_MENU, 1); ?>
                </ul>
            </nav>
        </header>

        <?php get_template_part("partials/breadcrumb"); ?>

        <div id="projectNotices" class="container">
            <?php do_action(KT_PROJECT_NOTICES_ACTION); ?>
        </div>
