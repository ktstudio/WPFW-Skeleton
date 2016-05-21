<?php get_header(); ?>

<main id="search" class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1><?php _e("Výsledky vyhledávání", "ZZZ_DOMAIN"); ?></h1>
                <h2><?php _e("pro:", "ZZZ_DOMAIN"); ?> <?php echo KT::stringEscape(get_search_query(false)); ?></h2>
            </header>
            <?php if (have_posts()) { ?>
                <div class="row">
                    <?php
                    global $wp_query;
                    $clearfixes = array(
                        2 => "<div class=\"visible-sm-block clearfix\"></div>", // za každým 2. záznamem
                        4 => "<div class=\"visible-lg-block visible-md-block clearfix\"></div>" // za každým 4. záznamem
                    );
                    KT_Presenter_Base::theQueryLoops($wp_query, "search", $clearfixes);
                    ?>
                </div>
                <div id="pagination" class="pagination clearfix">
                    <?php echo KT::bootstrapPagination(); ?>
                </div>
                <?php
            } else {
                ?> 
                <div class="row">
                    <p><?php _e("K dispozici nejsou žádné příspěvky...", "ZZZ_DOMAIN"); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
