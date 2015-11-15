<?php
$referencePresenter = new KT_ZZZ_Reference_Presenter($post);
$referenceModel = $referencePresenter->getModel();
get_header();
?>   

<main class="container">
    <div class="row">
        <div class="col-md-9">
            <header>
                <h1><?php echo $referenceModel->getTitle(); ?></h1>
            </header>
            <?php
            if ($referenceModel->hasExcrept()) {
                echo $referenceModel->getExcerpt();
            }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $referencePresenter->getThumbnailImageWithSelfLink(KT_ZZZ_IMAGE_SIZE_REFERENCE_GALLERY, null, null); ?>
                </div>
                <div class="col-md-6">
                    <?php
                    $referencePresenter->renderParamDateCreation();
                    $referencePresenter->renderParamClientName();
                    ?>
                </div>
            </div>
            <?php echo $referenceModel->getContent(); ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"><?php $referencePresenter->renderPrevReferenceLink(); ?></div>
        <div class="col-md-6"><?php $referencePresenter->renderNextReferenceLink(); ?></div>
    </div>
    <div class="row">
        <?php $referencePresenter->renderGallery(); ?>
    </div>
</main>

<?php
get_footer();
