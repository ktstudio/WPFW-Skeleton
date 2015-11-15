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
                    while (have_posts()) : the_post();
                        get_template_part("loops/loop", $post->post_type);
                    endwhile;
                    ?>
                </div>
                <div id="pagination" class="pagination clearfix">
                    <?php echo KT::bootstrapPagination(); ?>
                </div>
                <?php
            } else {
                ?> 
                <div class="row">
                    <p><?php _e("K dispozici nejsou žádné příspěvky...", ZZZ_DOMAIN); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
