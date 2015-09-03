<?php
$postPresenter = new KT_WP_Post_Base_Presenter($post);
$postModel = $postPresenter->getModel();
get_header();
?>   

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <main id="postDetail">
                <header>
                    <h1><?php echo $postModel->getTitle(); ?></h1>
                </header>

                <div class="entryContent">
                    <?php
                    if ($postModel->hasExcrept()) {
                        echo $postModel->getExcerpt();
                    }
                    echo $postModel->getContent();
                    ?>
                </div>
            </main>
        </div>
        <div class="col-lg-4 col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
