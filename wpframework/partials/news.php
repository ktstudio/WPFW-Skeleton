<?php $indexPresenter = new KT_ZZZ_Index_Presenter(); ?>

<section id="indexNews" class="container">
    <header><h2><?php echo KT_ZZZ::getThemeModel()->getCategoryNewsTitle(); ?></h2></header>
    <div class="row">
        <?php $indexPresenter->theNewsQuery(); ?>
    </div>
</section>