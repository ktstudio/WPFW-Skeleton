<?php
$postsPresenter = new KT_ZZZ_Posts_Presenter();
get_header();
?>

<main id="category" class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1><?php post_type_archive_title(); ?></h1>
            </header>
            <?php if ($postsPresenter->isResults()) { ?>
                <div id="posts-container" class="row" data-offset="<?php echo $postsPresenter->getInitialOffset(); ?>" data-category-id="<?php echo $postsPresenter->getCategoryId(); ?>">
                    <?php $postsPresenter->theResults(); ?>
                </div>
                <?php if ($postsPresenter->getCount() == $postsPresenter->getMaxCount()) { ?>
                    <div class="text-center">
                        <span id="load-more-posts" class="btn btn-default"><?php _e("Načíst další", "ZZZ_DOMAIN"); ?></span>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="row">
                    <?php echo $postsPresenter->getNoResultsMessage(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php
get_footer();
