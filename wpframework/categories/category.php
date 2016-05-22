<?php
$postsPresenter = new KT_ZZZ_Posts_Presenter();
$termPresenter = new KT_WP_Term_Base_Presenter($termModel = new KT_WP_Term_Base_Model(get_queried_object()));
get_header();
?>

<main id="category" class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1 class="text-center"><?php echo $termModel->getName(); ?></h1>
                <?php if ($termModel->isDescription()) { ?>
                    <h2 class="text-center hidden-xs"><?php echo $termModel->getDescription(); ?></h2>
                <?php } ?>
            </header>
            <?php if ($postsPresenter->isResults()) { ?>
                <div id="posts-container" class="row" data-offset="<?php echo $postsPresenter->getInitialOffset(); ?>">
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
