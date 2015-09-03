<?php get_header(); ?>

<div class="container">
    <div class="row">
        <?php get_sidebar(); ?>
        <main id="content" class="col-md-9">
            <header>
                <h1><?php _e("Výsledky vyhledávání", XYZ_DOMAIN); ?></h1>
                <p><?php _e("pro:", XYZ_DOMAIN); ?> <?php echo esc_attr(trim(get_search_query())); ?></p>
            </header>
            <?php if (have_posts()) { ?>
                <section class="productList row">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part("loops/loop", KT_WP_POST_KEY);
                    endwhile;
                    ?>
                </section>
                <div id="pagination" class="clearfix">
                    <?php echo KT::getPaginationLinks(); ?>
                </div>
                <?php
            } else {
                ?> 
                <section class="productList row">
                    <p><?php _e("K dispozici nejsou žádné příspěvky...", XYZ_DOMAIN); ?></p>
                </section>
                <?php
            }
            ?>
        </main>
    </div>
</div>

<?php
get_footer();
