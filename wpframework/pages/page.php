<?php
$pagePresenter = new KT_WP_Post_Base_Presenter($post);
$pageModel = $pagePresenter->getModel();
get_header();
?>   

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <main>
                <header>
                    <h1><?php echo $pageModel->getTitle(); ?></h1>
                </header>
                <?php
                if ($pageModel->hasExcrept()) {
                    echo $pageModel->getExcerpt();
                }
                echo $pageModel->getContent();
                ?>
            </main>
        </div>
        <div class="col-lg-4 col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
