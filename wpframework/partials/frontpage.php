<?php
if (KT::issetAndNotEmpty($post)) {
    $frontPagePresenter = new KT_WP_Post_Base_Presenter($post);
    $frontPageModel = $frontPagePresenter->getModel();
    ?>

    <section id="front-page">
        <header>
            <h1><?php echo $frontPageModel->getTitle(); ?></h1>
        </header>
        <?php
        if ($frontPageModel->hasExcerpt()) {
            echo $frontPageModel->getExcerpt();
        }
        echo $frontPageModel->getContent();
        ?>
    </section>

    <?php
}