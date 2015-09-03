<?php
$postPresenter = new KT_ZZZ_Post_Presenter($post);
$postModel = $postPresenter->getModel();
?>

<article>
    <a href="<?php echo $postModel->getPermalink(); ?>" title="<?php echo $postModel->getTitleAttribute(); ?>">
        <?php echo $postPresenter->getThumbnailImage(KT_WP_IMAGE_SIZE_THUBNAIL, array("class" => "img-responsive", "alt" => $postModel->getTitleAttribute())); ?>
    </a>
    <div>
        <h3><a href="<?php echo $postModel->getPermalink(); ?>" title="<?php echo $postModel->getTitleAttribute(); ?>"><?php echo $postModel->getTitle(); ?></a></h3>
        <p>"<?php echo $postModel->getExcerpt(false, 10); ?></p>
    </div>
</article>
