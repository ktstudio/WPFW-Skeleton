<?php
$termPresenter = new KT_WP_Term_Base_Presenter($termModel = $termPresenter->getModel());
get_header();
?>

<main id="category" class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1><?php echo $termModel->getName(); ?></h1>
                <h2 class="hidden-xs"><?php echo $termModel->getDescription(); ?></h2>
            </header>
            <?php if (have_posts()) { ?>
                <div class="row">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part("loops/loop", $post->post_type);
                    endwhile;
                    ?>
                </div>
                <div id="pagination" class="clearfix">
                    <?php echo $termPresenter->getPaginationLinks(); ?>
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
