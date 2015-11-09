<?php $indexPresenter = new KT_ZZZ_Index_Presenter(); ?>

<div class="row">
    <section id="news" class="col-md-12 col-lg-12">
        <header><h2><?php echo KT_ZZZ::getThemeModel()->getCategoryNewsTitle(); ?></h2></header>
        <div class="row">
            <?php $indexPresenter->theNewsQuery(); ?>
        </div>
    </section>
</div>
