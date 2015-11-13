<?php
$referencePresenter = new KT_ZZZ_Reference_Presenter($post);
$referenceModel = $referencePresenter->getModel();
?>

<article>
    <a href="<?php echo $referenceModel->getPermalink(); ?>" title="<?php echo $referenceModel->getTitleAttribute(); ?>">
        <?php echo $referencePresenter->getThumbnailImage(KT_ZZZ_IMAGE_SIZE_REFERENCE_GALLERY, array("class" => "img-responsive", "alt" => $referenceModel->getTitleAttribute())) ?>
        <div>
            <h2><?php echo $referenceModel->getTitle(); ?></h2>
            <div><?php $referencePresenter->renderParamTypes(); ?></div>
            <?php echo $referenceModel->getExcerpt(); ?>
            <span><?php _e("Zobrazit", KT_DOMAIN); ?></span>
        </div>
    </a>
</article>
