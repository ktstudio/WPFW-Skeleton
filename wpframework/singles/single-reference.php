<?php
$postPresenter = new KT_ZZZ_Reference_Presenter($postModel = new KT_ZZZ_Reference_Model($post));
get_header();
?>   

<main class="container">
    <div class="row">
        <div class="col-md-9">
            <header>
                <h1><?php echo $postModel->getTitle(); ?></h1>
            </header>
            <?php
            if ($postModel->hasExcerpt()) {
                echo $postModel->getExcerpt();
            }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $postPresenter->getThumbnailImageWithSelfLink(KT_ZZZ_IMAGE_SIZE_REFERENCE_GALLERY, null, null); ?>
                </div>
                <div class="col-md-6">
                    <?php
                    $postPresenter->renderParamDateCreation();
                    $postPresenter->renderParamClientName();
                    ?>
                </div>
            </div>
            <?php echo $postModel->getContent(); ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"><?php $postPresenter->renderPrevReferenceLink(); ?></div>
        <div class="col-md-6"><?php $postPresenter->renderNextReferenceLink(); ?></div>
    </div>
    <div class="row">
        <?php $postPresenter->renderGallery(); ?>
    </div>
</main>

<?php
get_footer();
