<?php
if (KT::issetAndNotEmpty($post)) {
    $frontPagePresenter = new KT_WP_Post_Base_Presenter($post);
    $frontPageModel = $frontPagePresenter->getModel();
    ?>
    <div class="row">
        <section id="front-page" class="col-md-12">
            <header>
                <h1><?php echo $frontPageModel->getTitle(); ?></h1>
            </header>
            <?php
            if ($frontPageModel->hasExcrept()) {
                echo $frontPageModel->getExcerpt();
            }
            echo $frontPageModel->getContent();
            ?>
        </section>
    </div>
    <?php
}