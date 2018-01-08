<?php $postPresenter = new KT_ZZZ_Post_Presenter($postModel = new KT_ZZZ_Post_Model($post)); ?>

<article class="col-sm-12 col-md-4 col-lg-3">
    <a href="<?php echo $postModel->getPermalink(); ?>" title="<?php echo $postModel->getTitleAttribute(); ?>">
        <?php echo $postPresenter->getThumbnailImage(KT_WP_IMAGE_SIZE_THUBNAIL, ["class" => "img-responsive center-block", "alt" => $postModel->getTitleAttribute()]); ?>
    </a>
    <h3 class="text-center"><a href="<?php echo $postModel->getPermalink(); ?>" title="<?php echo $postModel->getTitleAttribute(); ?>"><?php echo $postModel->getTitle(); ?></a></h3>
    <p class="text-center"><?php echo $postModel->getExcerpt(false, 10); ?></p>
</article>
