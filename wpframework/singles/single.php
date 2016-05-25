<?php
$postPresenter = new KT_ZZZ_Post_Presenter($postModel = new KT_ZZZ_Post_Model($post));
get_header();
?>   

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
        <div class="col-md-9">
            <main>
                <header>
                    <h1><?php echo $postModel->getTitle(); ?></h1>
                </header>
                <?php
                if ($postModel->hasExcerpt()) {
                    echo $postModel->getExcerpt();
                }
                echo $postModel->getContent();
                ?>
            </main>
        </div>
    </div>
</div>

<?php
get_footer();
