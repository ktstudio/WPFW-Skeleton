<?php $postPresenter = new KT_ZZZ_Reference_Presenter($postModel = new KT_ZZZ_Reference_Model($post));?>

<article class="col-sm-12 col-md-6 col-lg-4">
    <a href="<?php echo $postModel->getPermalink(); ?>" title="<?php echo $postModel->getTitleAttribute(); ?>">
        <?php echo $postPresenter->getThumbnailImage(KT_ZZZ_IMAGE_SIZE_REFERENCE_GALLERY, ["class" => "img-responsive", "alt" => $postModel->getTitleAttribute()]); ?>
    </a>
    <h3><a href="<?php echo $postModel->getPermalink(); ?>" title="<?php echo $postModel->getTitleAttribute(); ?>"><?php echo $postModel->getTitle(); ?></a></h3>
    <p><?php echo $postModel->getExcerpt(false, 10); ?></p>
</article>
