<?php
$referencePresenter = new KT_ZZZ_Reference_Presenter($post);
$referenceModel = $referencePresenter->getModel();
?>

<article class="col-sm-12 col-md-6 col-lg-4">
    <a href="<?php echo $referenceModel->getPermalink(); ?>" title="<?php echo $referenceModel->getTitleAttribute(); ?>">
        <?php echo $referencePresenter->getThumbnailImage(KT_ZZZ_IMAGE_SIZE_REFERENCE_GALLERY, array("class" => "img-responsive", "alt" => $referenceModel->getTitleAttribute())); ?>
    </a>
    <h3><a href="<?php echo $referenceModel->getPermalink(); ?>" title="<?php echo $referenceModel->getTitleAttribute(); ?>"><?php echo $referenceModel->getTitle(); ?></a></h3>
    <p><?php echo $referenceModel->getExcerpt(false, 10); ?></p>
</article>
