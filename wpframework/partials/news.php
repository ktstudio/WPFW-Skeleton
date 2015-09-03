<?php $indexPresenter = new KT_XYZ_Index_Presenter(); ?>

<section id="indexNews" class="container">
    <header><h2><?php echo KT_XYZ::getThemeModel()->getCategoryNewsTitle(); ?></h2></header>
    <div class="row">
        <?php $indexPresenter->theNewsQuery(); ?>
    </div>
</section>