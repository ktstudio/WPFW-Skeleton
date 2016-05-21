<?php get_header(); ?>

<main id="archive" class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1><?php post_type_archive_title(); ?></h1>
            </header>
            <?php if (have_posts()) { ?>
                <div class="row">
                    <?php
                    global $wp_query;
                    $clearfixes = array(
                        2 => "<div class=\"visible-sm-block clearfix\"></div>", // za každým 2. záznamem
                        3 => "<div class=\"visible-lg-block visible-md-block clearfix\"></div>" // za každým 3. záznamem
                    );
                    KT_Presenter_Base::theQueryLoops($wp_query, KT_ZZZ_REFERENCE_KEY, $clearfixes);
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
